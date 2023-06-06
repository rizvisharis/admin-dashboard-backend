<?php

namespace App\Services;

use Exception;
use App\Utils\Constants;
use App\Traits\UtilTraits;
use App\Http\Resources\RecordResource;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Contracts\RecordRepositoryInterface;

class RecordService
{
    use UtilTraits;

    private $recordRepository;

    public function __construct(RecordRepositoryInterface $recordRepository)
    {
        $this->recordRepository = $recordRepository;
    }

    public function create(array $requestData): RecordResource
    {
        try {
            $requestData['profile_photo_path'] = $this->saveImage($requestData['profile_photo']);
            $record = $this->recordRepository->create($requestData);
            return new RecordResource($record);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function get(array $requestData = null): array
    {
        try {
            if (isset($request['search'])) {
                $condition = [
                    ['username', 'like', '%' . $requestData['search'] . '%']
                ];
                $records = $this->recordRepository->get($condition);
            } else {
                $records = $this->recordRepository->get();
            }
            $records->latest();
            $query = $records->paginate(isset($requestData['page-size']) ? (int)$requestData['page-size'] : 10);
            return [
                'records' => RecordResource::collection($query),
                'page_info' => $this->getPaginateInfo($query)
            ];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function show(int $id): RecordResource
    {
        try {
            $record = $this->recordRepository->find($id);
            if (!$record)
                throw new Exception(Constants::$ERROR_MESSAGE['id_not_exist'], Constants::$ERROR_CODE['not_found']);

            return new RecordResource($record);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function update(array $requestData, int $id): RecordResource
    {
        try {
            $record = $this->recordRepository->find($id);
            if (!$record)
                throw new Exception(Constants::$ERROR_MESSAGE['id_not_exist'], Constants::$ERROR_CODE['not_found']);

            if (isset($requestData['username'])) $record->username = $requestData['username'];
            if (isset($requestData['full_name'])) $record->full_name = $requestData['full_name'];
            if (isset($requestData['gender'])) $record->gender = $requestData['gender'];
            if (isset($requestData['profile_photo'])) $record->profile_photo_path = $this->saveImage($requestData['profile_photo']);

            $this->recordRepository->update($record);
            $updatedRecord = $this->recordRepository->find($id);
            return new RecordResource($updatedRecord);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function delete(int $id): null
    {
        try {
            $record = $this->recordRepository->find($id);
            if (!$record)
                throw new Exception(Constants::$ERROR_MESSAGE['id_not_exist'], Constants::$ERROR_CODE['not_found']);

            Storage::disk('profile_photos')->delete($record->profile_photo_path);
            return $this->recordRepository->delete($record);
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    private function saveImage($image): string
    {
        $pathImage = $image->store('/', 'profile_photos');
        return '/profile_photos/' . $pathImage;
    }
}
