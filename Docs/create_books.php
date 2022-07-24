<?php

  // The PDO Constructor for SQLITE requires that the DSN include the complete, absolute path to the SQLITE database file.
  // In my system, for the current project layout, the path is as shown.

  try {
    $db = new \PDO('sqlite:/home/bdmc/projects/Randstrad-MoveHQ/randstrad-movehq/sites/default/files/.sqlite',

      '', '', [
        \PDO::ATTR_EMULATE_PREPARES   => FALSE,
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      ]) ;

  } catch (PDOException $e) {
    die('Unable to open database connection') ;
  }

// Now that we have a database connection, create the table

  $sql = "CREATE TABLE IF NOT EXISTS books (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name VARCHAR(255) NOT NULL,
  author VARCHAR(255),
  shelved BOOLEAN DEFAULT false,
  acquired DATE ) " ;


  $row_count = 0 ;

  try {
    $row_count = $db->exec( $sql ) ;
  } catch (PDOException $e) {
    echo "Create Books Table failed.\n" ;
    echo "Error Info: " . var_export(PDO::errorInfo(), TRUE) . "\n\n" ;
    exit ;
  }

  // Expect a zero here
  echo "Create Books Table result: $row_count\n" ;

  // Now, insert the sample data
  // Use Prepared statements and an array of data
  $sql = "INSERT INTO books ( name, author, shelved, acquired ) VALUES ( :name, :author, :shelved, :acquired )" ;
  $stmt = $db->prepare( $sql ) ;

  $data = array(
    array(
      'name'     => 'National Museum of Scotland Guide',
     'author'   => 'anonymous',
     'shelved'  => TRUE,
     'acquired' => '2014-10-12 11:11:00'
    ),
    array(
      'name'     => 'Photography - A Victorian Sensation',
     'author'   => 'A. D. Morrison-Low',
     'shelved'  => TRUE,
     'acquired' => '2014-10-12 11:14:00'
    ),
    array(
      'name'     => 'The Goal That United Canada',
     'author'   => 'Sean Mitton',
     'shelved'  => TRUE,
     'acquired' => '2005-07-01 12:10:00'
    ),
    array(
      'name'     => 'Event Streams In Action',
     'author'   => 'Dean Crettaz',
     'shelved'  => FALSE,
     'acquired' => '2017-03-10 09:15:00'
    ),
    array(
      'name'     => 'How To Break Software - A Practical Guide To Testing',
     'author'   => 'Whittaker',
     'shelved'  => TRUE,
     'acquired' => '2010-05-23 14:23:00'
    ),
    array(
      'name'    => 'Living With Books',
     'author'  => 'Alan Powers',
     'shelved' => TRUE,
      'acquired' => '2011-01-01 16:21:00'
    ),
    array(
      'name'     => 'Frank Lloyd Wright - A Gatefold Portfolio',
     'author'   => 'Sommer',
     'shelved'  => TRUE,
     'acquired' => '2012-12-12 12:12:00'
    ),
    array(
      'name'     => 'A Handbook Of The Canadian Rockies',
     'author'   => 'Ben Gadd',
     'shelved'  => TRUE,
     'acquired' => '1983-08-23 10:10:00'
    ),
  );

  // Finally, loop through the array of data,
  // extracting each group of data fields and perform the Insert.
  //
  // Be paranoid and show each row's data and the success of the Insert
  foreach ( $data as &$row ) {
    echo var_export( $row, true ) . "\n" ;

     $ret = $stmt->execute( $row ) ;

    echo "result: " . var_export( $ret, true ) . "\n" ;
  }
