<?php
    declare(strict_types = 1);

    class NextMovie{
        public function __construct(
            private string $title,
            private int $days_until,
            private string $following_production,
            private string $release_date,
            private string $poster_url,
            private string $overview
        ){
        }

        // Métodos estáticos no tienen que instanciar la clase, se pueden hacer con Clase::método_estático
        public static function fetch_and_create_movie(string $url): NextMovie {
            $result = file_get_contents($url);
            $data = json_decode($result, true);

            // new self para instanciar la clase a la que pertenece el método
            return new self(
                $data["title"],
                $data["days_until"],
                $data["following_production"]["title"] ?? "Desconocido",
                $data["release_date"],
                $data["poster_url"],
                $data["overview"]
            );
        }

        public function get_until_message(): string { 
            $days = $this->days_until;
            return match (true) {
                $days == 0  => "¡Hoy se estrena!",
                $days == 1  => "Mañana se estrena",
                $days < 7   => "Esta semana se estrena",
                $days < 30  => "Este mes se estrena",
                default     => "$days días hasta el estreno"
            };
        }

        public function get_data(){
            return get_object_vars($this);
        }
    }
?>