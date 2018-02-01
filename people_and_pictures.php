<?php

  function guesstimate_v2() {
    // Set up People and Pictures
    $people = [];
    $pictures = [];

    $numberofPeople = 3;
    $numberofPictures = 4;
    $iterations = 1000000;
    $failureCount = 0;
    $successCount = 0;

    // 20 people
    // [0] => 0
    // [1] => 1
    // ...
    // [19] => 19

    for ($x = 0; $x < $numberofPeople; $x++) {
      $people[] = $x;
    }

    // 25 pictures
    // [0] => 0
    // [1] => 1
    // ...
    // [23] => 23
    // [24] => 24
    for ($x = 0; $x < $numberofPictures; $x++) {
      $pictures[] = $x;
    }

    // Each loop is another attempt
    for ($x = 0; $x < $iterations; $x++) {
      // randomize the picture order. The first 'x' are the ones we picked
      shuffle($pictures);
      // New Attempt.
      $failedToMatch = false;
      // Loop through the people and match to random picture
      foreach ($people as $key => $value) {
        // If one of the guesses don't match, then no point in continuing...
        if ($value != $pictures[$key]) {
          $failedToMatch = true;
          break;
        }
      }
      // If we didn't fail to match, that means we succeeded...
      if ($failedToMatch) {
        $failureCount++;
      } else {
        $successCount++;
      }
    }
    $percentage = $successCount/($successCount + $failureCount) * 100;
    var_dump($percentage . '%');
  }