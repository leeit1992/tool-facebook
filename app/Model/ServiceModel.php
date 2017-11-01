<?php
namespace App\Model;

use Atl\Database\Model;

class ServiceModel extends Model
{
    public function __construct() {
        parent::__construct('services');
    }

    public function save( $argsData, $id = null ) {
        if ( $id ) {
            $this->db->update(
                $this->table,
                $argsData,
                ['id' => $id]
            );
            return $id;
        } else {
            $this->db->insert(
                $this->table,
                $argsData
            );
            return $this->db->id();
        }
    }

    public function getAll() {
        return $this->db->select(
            $this->table,
            '*',
            [
                    'ORDER' => [
                        'id' => 'DESC',
                    ],
                ]
        );
    }

    public function getBy( $key, $value ) {
        return $this->db->select(
            $this->table,
            '*',
            [
                    $key => $value,
                    'ORDER' => [
                        'id' => 'DESC',
                    ],
                ]
        );
    }

    public function getCount( $args = null ) {
        return $this->db->count(
            $this->table,
            !empty( $args ) ? $args : null
        );
    }

    public function getLinmit( $ofset = 0, $limit = 10 ) {
        return $this->db->select(
            $this->table,
            '*',
            [
                'ORDER' => [
                    'id' => 'DESC',
                ],
                "LIMIT" => [$ofset, $limit]
            ]
        );
    }

    public function delete( $args ){
        return $this->db->delete(
            $this->table,
            [
            "AND" => [
                "id" => $args,
            ]
        ]);
    }
}
