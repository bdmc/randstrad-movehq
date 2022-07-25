<?php

  namespace Drupal\randstrad_movehq_module\Controller;

  // I have created some stubs, intended to be replaced with
  // real code to accomplish the CRUD tasks desired.
  //
  // However, I have not been able to reach a satisfactory
  // conclusion so far.
  class RandstradMoveHQController {

    public function randstrad_movehq() {
      return [
        '#markup' => 'Welcome to our Website.',
      ];
    }

    public function welcome() {
      return [
        '#markup' => 'Welcome to our Website.',
      ];
    }

    // The beginning of a function to prepare and display
    // the content of the Books database table.
    public function booklist() {
      $row    = [];
      $column = [
        'data' => [
          '#type'     => 'inline_template',
          '#template' => '{{ name }} {{ author }} {{ shelved }} {{ acquired }}',
        ],
      ];

      $row[] = $column;

      foreach ($row_data as $data) {
        $row[] = $data;
      }

      return [
        '#markup' => 'Book List',
        '#data'   => $row,
      ];
    }

    public function bookedit() {
      return [
        '#markup' => 'Welcome to our Website.',
      ];
    }


    public function bookadd() {
      return [
        '#markup' => 'Welcome to our Website.',
      ];
    }


    public function bookdel() {
      return [
        '#markup' => 'Welcome to our Website.',
      ];
    }


  }
