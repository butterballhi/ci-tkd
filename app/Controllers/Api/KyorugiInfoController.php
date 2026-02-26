<?php

namespace App\Controllers\Api;

use App\Models\KyorugiInfoModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class KyorugiInfoController extends ResourceController
{
    protected $modelName = KyorugiInfoModel::class;
    protected $format    = 'json';

    /**
     * GET /api/kyorugi-info
     * Pengujian Normal : 200 OK
     */
    public function index()
    {
        $data = $this->model->findAll();

        if (empty($data)) {
            return $this->failNotFound(
                'Data kyorugi info tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Data kyorugi info berhasil diambil',
            'data'    => $data
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * GET /api/kyorugi-info/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);

        if (!$data) {
            return $this->failNotFound(
                'Data kyorugi info tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Detail kyorugi info berhasil diambil',
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
     * POST /api/kyorugi-info
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
            'message' => 'Data kyorugi info berhasil ditambahkan'
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
     * PUT /api/kyorugi-info/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data kyorugi info tidak ditemukan'
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
            'message' => 'Data kyorugi info berhasil diperbarui'
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * DELETE /api/kyorugi-info/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data kyorugi info tidak ditemukan'
            );
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => true,
            'message' => 'Data kyorugi info berhasil dihapus'
        ]);
    }
}