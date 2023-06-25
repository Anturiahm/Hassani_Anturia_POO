<?php
    class Moto{
        private $moto_id;
        private $brand;
        private $model;
        private $type;
        private $image;

        public function __construct(?int $moto_id,
                                    string $brand,
                                    string $model,
                                    string $type,
                                    ?string $image){
            $this->moto_id = $moto_id;
            $this->brand = $brand;
            $this->model = $model;
            $this->type = $type;
            $this->image = $image;
        }

      

        public function getMoto_id()
        {
                return $this->moto_id;
        }

  
        public function setMoto_id($moto_id)
        {
                $this->moto_id = $moto_id;

                return $this;
        }

   
        public function getBrand()
        {
                return $this->brand;
        }

     
        public function setBrand($brand)
        {
                $this->brand = $brand;

                return $this;
        }


        public function getModel()
        {
                return $this->model;
        }

  
        public function setModel($model)
        {
                $this->model = $model;

                return $this;
        }


        public function getType()
        {
                return $this->type;
        }

 
        public function setType($type)
        {
                $this->type = $type;

                return $this;
        }

    
        public function getImage()
        {
                return $this->image;
        }

        public function setImage($image)
        {
                $this->image = $image;

                return $this;
        }
    }
?>