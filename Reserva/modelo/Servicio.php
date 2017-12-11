<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Servicio
 *
 * @author USER
 */
class Servicio {
    private $idServicio;
    private $nombreServicio;
    private $descripcionServicio;
    private $caracteristicasServicio;
    private $presioServicio;
    private $estadoServicio;
    private $tipoServicio;
    private $idCategoriaServicio;
    function __construct($idServicio, $nombreServicio, $descripcionServicio, $caracteristicasServicio, $presioServicio, $estadoServicio, $tipoServicio, $idCategoriaServicio) {
        $this->idServicio = $idServicio;
        $this->nombreServicio = $nombreServicio;
        $this->descripcionServicio = $descripcionServicio;
        $this->caracteristicasServicio = $caracteristicasServicio;
        $this->presioServicio = $presioServicio;
        $this->estadoServicio = $estadoServicio;
        $this->tipoServicio = $tipoServicio;
        $this->idCategoriaServicio = $idCategoriaServicio;
    }
    function getIdServicio() {
        return $this->idServicio;
    }

    function getNombreServicio() {
        return $this->nombreServicio;
    }

    function getDescripcionServicio() {
        return $this->descripcionServicio;
    }

    function getCaracteristicasServicio() {
        return $this->caracteristicasServicio;
    }

    function getPresioServicio() {
        return $this->presioServicio;
    }

    function getEstadoServicio() {
        return $this->estadoServicio;
    }

    function getTipoServicio() {
        return $this->tipoServicio;
    }

    function getIdCategoriaServicio() {
        return $this->idCategoriaServicio;
    }

    function setIdServicio($idServicio) {
        $this->idServicio = $idServicio;
    }

    function setNombreServicio($nombreServicio) {
        $this->nombreServicio = $nombreServicio;
    }

    function setDescripcionServicio($descripcionServicio) {
        $this->descripcionServicio = $descripcionServicio;
    }

    function setCaracteristicasServicio($caracteristicasServicio) {
        $this->caracteristicasServicio = $caracteristicasServicio;
    }

    function setPresioServicio($presioServicio) {
        $this->presioServicio = $presioServicio;
    }

    function setEstadoServicio($estadoServicio) {
        $this->estadoServicio = $estadoServicio;
    }

    function setTipoServicio($tipoServicio) {
        $this->tipoServicio = $tipoServicio;
    }

    function setIdCategoriaServicio($idCategoriaServicio) {
        $this->idCategoriaServicio = $idCategoriaServicio;
    }



}
