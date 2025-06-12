<?php


namespace App\Controllers\Api;


use CodeIgniter\RESTful\ResourceController;
use App\Models\StudentModel;


class StudentApiController extends ResourceController
{
    protected $modelName = StudentModel::class;
    protected $format = 'json';


    public function index()
    {
        return $this->respond($this->model->findAll());
    }


    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) return $this->failNotFound('Student not found');
        return $this->respond($data);
    }


    public function create()
    {
        $input = $this->request->getJSON(true);
        if (!$this->model->insert($input)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respondCreated($input);
    }


    public function update($id = null)
    {
        $input = $this->request->getJSON(true);
        if (!$this->model->update($id, $input)) {
            return $this->failValidationErrors($this->model->errors());
        }
        return $this->respond(['status' => 'updated']);
    }


    public function delete($id = null)
    {
        if (!$this->model->delete($id)) {
            return $this->failServerError('Delete failed');
        }
        return $this->respondDeleted(['id' => $id]);
    }
}


