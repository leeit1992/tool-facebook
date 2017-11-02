<?php
namespace App\Model;

use Atl\Database\Model;

class ServiceModel extends AtlModel
{
    public function __construct() {
        parent::__construct('services');
    }

    /**
     * Sett meta table.
     * 
     * @return string
     */
    public function metaDataTable(){
        return 'servicemeta';
    }

    /**
     * Set meta query.
     * 
     * @return stirng
     */
    public function metaDataQueryBy(){
        return 'service_id';
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

    public function getAllbyType($type = '') {
        return $this->db->select(
            $this->table,
            '*',
            [
                'service_type' => $type,
                'ORDER' => [
                        'id' => 'ASC',
                    ]
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

    public function getLinmitbyType( $ofset = 0, $limit = 10, $type = '' ) {
        return $this->db->select(
            $this->table,
            '*',
            [
                'service_type' => $type,
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
