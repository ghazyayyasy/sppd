<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');      

  if ( ! function_exists('tgl_indo')) {
    function date_indo($tgl) {
      $pecah = explode("-",$tgl);
      $tanggal = $pecah[2];
      $bulan = bulan($pecah[1]);
      $tahun = $pecah[0];
      return $tanggal.' '.$bulan.' '.$tahun;
    }
  }

  if ( ! function_exists('bulan')) {
    function bulan($bln) {
      if ($bln == '01') {
        return 'Januari';
      } elseif ($bln == '02') {
        return 'Februari';
      } elseif ($bln == '03') {
        return 'Maret';
      } elseif ($bln == '04') {
        return 'April';
      } elseif ($bln == '05') {
        return 'Mei';
      } elseif ($bln == '06') {
        return 'Juni';
      } elseif ($bln == '07') {
        return 'Juli';
      } elseif ($bln == '08') {
        return 'Agustus';
      } elseif ($bln == '09') {
        return 'September';
      } elseif ($bln == '10') {
        return 'Oktober';
      } elseif ($bln == '11') {
        return 'November';
      } elseif ($bln == '12') {
        return 'Desember';
      } 
    }
  }
?>