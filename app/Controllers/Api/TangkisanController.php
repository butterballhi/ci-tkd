<?php

namespace App\Controllers\Api;

use App\Models\TangkisanModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class TangkisanController extends ResourceController
{
    protected $modelName = TangkisanModel::class;
    protected $format    = 'json';

    /**
     * GET /api/tangkisan
     * Pengujian Normal : 200 OK
     */
    public function index()
    {
        $data = $this->model->findAll();
        $baseUrl = rtrim(base_url(), '/');

        foreach ($data as &$row) {
            if (!empty($row['image'])) {
                $row['image_url'] = $baseUrl . '/img/teknik/tangkisan/' . $row['image'];
            } else {
                $row['image_url'] = null;
            }
        }

        if (empty($data)) {
            return $this->failNotFound(
                'Data tangkisan tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Data tangkisan berhasil diambil',
            'data'    => $data
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * GET /api/tangkisan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        $baseUrl = rtrim(base_url(), '/');
        
        foreach ($data as &$row) {
            if (!empty($row['image'])) {
                $row['image_url'] = $baseUrl . '/img/teknik/tangkisan/' . $row['image'];
            } else {
                $row['image_url'] = null;
            }
        }

        if (!$data) {
            return $this->failNotFound(
                'Data tangkisan tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Detail tangkisan berhasil diambil',
            'data'    => $data
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * TIDAK DIGUNAKAN
     * REST API tanpa antarmuka (view)
     */
    public function new()
    {
        return $this->fail(
            'Method tidak digunakan pada REST API',
            ResponseInterface::HTTP_METHOD_NOT_ALLOWED
        );
    }

    /**
     * POST /api/tangkisan
     * Pengujian Normal      : 201 Created
     * Pengujian Tidak Normal: 400 Bad Request
     */
    public function create()
    {
        $input = $this->request->getJSON(true);

        if (!$this->model->insert($input)) {
            return $this->failValidationErrors(
                $this->model->errors()
            );
        }

        return $this->respondCreated([
            'status'  => true,
            'message' => 'Data tangkisan berhasil ditambahkan'
        ]);
    }

    /**
     * TIDAK DIGUNAKAN
     * REST API tanpa antarmuka (view)
     */
    public function edit($id = null)
    {
        return $this->fail(
            'Method tidak digunakan pada REST API',
            ResponseInterface::HTTP_METHOD_NOT_ALLOWED
        );
    }

    /**
     * PUT /api/tangkisan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data tangkisan tidak ditemukan'
            );
        }

        $input = $this->request->getJSON(true);

        if (!$this->model->update($id, $input)) {
            return $this->failValidationErrors(
                $this->model->errors()
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Data tangkisan berhasil diperbarui'
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * DELETE /api/tangkisan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data tangkisan tidak ditemukan'
            );
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => true,
            'message' => 'Data tangkisan berhasil dihapus'
        ]);
    }
}