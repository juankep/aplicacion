<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Trabajador
 *
 * @author USER
 */
class Trabajador {
    private $idEmpleado;
    private $user;
    private $password;
    private $password2;
    private $nombreEmpleado;
    private $telefonoEmpleado;
    private $emailEmpleado;
    private $direccionEmpleado;
    private $idServicioEmpleado;
    function __construct($idEmpleado, $user, $password, $password2, $nombreEmpleado, $telefonoEmpleado, $emailEmpleado, $direccionEmpleado, $idServicioEmpleado) {
        $this->idEmpleado = $idEmpleado;
        $this->user = $user;
        $this->password = $password;
        $this->password2 = $password2;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->telefonoEmpleado = $telefonoEmpleado;
        $this->emailEmpleado = $emailEmpleado;
        $this->direccionEmpleado = $direccionEmpleado;
        $this->idServicioEmpleado = $idServicioEmpleado;
    }
    function getIdEmpleado() {
        return $this->idEmpleado;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function getPassword2() {
        return $this->password2;
    }

    function getNombreEmpleado() {
        return $this->nombreEmpleado;
    }

    function getTelefonoEmpleado() {
        return $this->telefonoEmpleado;
    }

    function getEmailEmpleado() {
        return $this->emailEmpleado;
    }

    function getDireccionEmpleado() {
        return $this->direccionEmpleado;
    }

    function getIdServicioEmpleado() {
        return $this->idServicioEmpleado;
    }

    function setIdEmpleado($idEmpleado) {
        $this->idEmpleado = $idEmpleado;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPassword2($password2) {
        $this->password2 = $password2;
    }

    function setNombreEmpleado($nombreEmpleado) {
        $this->nombreEmpleado = $nombreEmpleado;
    }

    function setTelefonoEmpleado($telefonoEmpleado) {
        $this->telefonoEmpleado = $telefonoEmpleado;
    }

    function setEmailEmpleado($emailEmpleado) {
        $this->emailEmpleado = $emailEmpleado;
    }

    function setDireccionEmpleado($direccionEmpleado) {
        $this->direccionEmpleado = $direccionEmpleado;
    }

    function setIdServicioEmpleado($idServicioEmpleado) {
        $this->idServicioEmpleado = $idServicioEmpleado;
    }



}
