<?php

namespace App\Models;

class TripsModel extends Model {

    protected $id_trip; 
    protected $id_user;
    protected $departure_agency_id;
    protected $arrival_agency_id;
    protected $departure_datetime;
    protected $arrival_datetime;
    protected $total_seats;
    protected $available_seats;
    protected $contact_phone;
    protected $contact_email;
    protected $created_at;
    protected $updated_at;

    public function __construct(){
        parent::__construct(); 
        
        $this->table = 'trips';
    }
}
