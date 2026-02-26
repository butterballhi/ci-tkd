<?php

namespace App\Controllers\Api;

use App\Models\PoomsaeModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class PoomsaeController extends ResourceController
{
    protected $modelName = PoomsaeModel::class;
    protected $format    = 'json';

    /**
     * GET /api/poomsae
     * Pengujian Normal : 200 OK
     */
    public function index()
    {
        $data = $this->model->findAll();
        $baseUrl = rtrim(base_url(), '/');

        foreach ($data as &$row) {

            // image utama
            $row['image_url'] = !empty($row['image'])
                ? $baseUrl . '/img/poomsae/poomsae/' . $row['image']
                : null;

            // bagan / chart
            $row['chart_image_url'] = !empty($row['chart_image'])
                ? $baseUrl . '/img/poomsae/bagan/' . $row['chart_image']
                : null;
        }

        if (empty($data)) {
            return $this->failNotFound(
                'Data poomsae tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Data tendangan berhasil diambil',
            'data'    => $data
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * GET /api/tendangan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function show($id = null)
    {
        $data = $this->model->find($id);
        $baseUrl = rtrim(base_url(), '/');

        foreach ($data as &$row) {

            // image utama
            $row['image_url'] = !empty($row['image'])
                ? $baseUrl . '/img/poomsae/poomsae/' . $row['image']
                : null;

            // bagan / chart
            $row['chart_image_url'] = !empty($row['chart_image'])
                ? $baseUrl . '/img/poomsae/bagan/' . $row['chart_image']
                : null;
        }
        
        if (!$data) {
            return $this->failNotFound(
                'Data tendangan tidak ditemukan'
            );
        }

        return $this->respond([
            'status'  => true,
            'message' => 'Detail tendangan berhasil diambil',
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
     * POST /api/tendangan
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
            'message' => 'Data tendangan berhasil ditambahkan'
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
     * PUT /api/tendangan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data tendangan tidak ditemukan'
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
            'message' => 'Data tendangan berhasil diperbarui'
        ], ResponseInterface::HTTP_OK);
    }

    /**
     * DELETE /api/tendangan/{id}
     * Pengujian Normal      : 200 OK
     * Pengujian Tidak Normal: 404 Not Found
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound(
                'Data tendangan tidak ditemukan'
            );
        }

        $this->model->delete($id);

        return $this->respondDeleted([
            'status'  => true,
            'message' => 'Data tendangan berhasil dihapus'
        ]);
    }
}