<?php

namespace Corp\Repositories;

use Corp\Portfolio;

class PortfoliosRepository extends Repository {

    public function __construct(Portfolio $portfolio) {
      $this->model = $portfolio;
    }
}
 ?>
