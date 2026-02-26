<?php

namespace App\Controllers\Api;

use App\Models\KelasBeratModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class KelasBeratController extends ResourceController
{
    protected $modelName = KelasBeratModel::class;
    protected $format    = 'json';

    /**
     * GET /api/kelas-berat
     * Pengujian Normal : 200 OK
     */
    public function index()
    {
        $data = $this->model->findAll();

        if (empty($data)) {
            return $this->failNotFound(
                'Data kelas berat tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Data kelas berat berhasil diambil',
            'data'    => $data
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * GET /api/kelas-berat/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return $this->failNotFound(
                'Data kelas berat tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Detail kelas berat berhasil diambil',
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
     * POST /api/kelas-berat
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
            'message' => 'Data kelas berat berhasil ditambahkan'
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
     * PUT /api/kelas-berat/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data kelas berat tidak ditemukan'
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
            'message' => 'Data kelas berat berhasil diperbarui'
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * DELETE /api/kelas-berat/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data kelas berat tidak ditemukan'
            );
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => true,
            'message' => 'Data kelas berat berhasil dihapus'
        ]);
    }
}