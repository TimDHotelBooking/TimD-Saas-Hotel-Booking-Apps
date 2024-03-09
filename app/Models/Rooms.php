<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    protected $fillable = [
        'room_id',
        'property_id',
        'room_type_id',
        'availability_status',
        'price',
        'no_of_rooms',
        'created_by',
        'updated_by',
        'status'
    ];

    const AVAILABLE_STATUS = 'Available';
    const BOOKED_STATUS = 'Booked';
    const OCCUPIED_STATUS = 'Occupied';
    const MAINTENANCE_STATUS = 'Maintenance';
    const CLEANING_STATUS = 'Cleaning';


    public function property(){
        return $this->belongsTo(Property::class,'property_id');
    }

    public function tariffs(){
        return $this->hasMany(Tariff::class,'room_id');
    }

    public function bookings(){
        return $this->hasMany(Bookings::class,'room_id');
    }

    public function type(){
        return $this->belongsTo(Type::class,'room_type_id');
    }

    public function availableDates()
    {
        // Get all tariff dates for the room
        $tariffDates = $this->tariffs()->get(['start_date', 'end_date']);

        // Get all booked dates for the room
        $bookedDates = $this->bookings()->get(['check_in_date', 'check_out_date']);

        // Initialize array to hold available dates
        $availableDates = [];

        // Iterate over each tariff date
        foreach ($tariffDates as $tariff) {
            // Initialize array to hold non-overlapping available date ranges
            $nonOverlappingDates = [];

            // Check if any booked date overlaps with the tariff date
            foreach ($bookedDates as $booking) {
                // If there's an overlap, split the tariff date range
                if (
                    ($tariff->start_date <= $booking->check_out_date && $tariff->end_date >= $booking->check_in_date) ||
                    ($tariff->start_date >= $booking->check_in_date && $tariff->end_date <= $booking->check_out_date)
                ) {
                    // Split the tariff date range into two non-overlapping ranges
                    if ($tariff->start_date < $booking->check_in_date) {
                        $end_date = Carbon::parse($booking->check_in_date)->addDays(-1)->format("Y-m-d");
                        $nonOverlappingDates[] = ['start_date' => $tariff->start_date, 'end_date' => $end_date];
                    }
                    if ($tariff->end_date > $booking->check_out_date) {
                        $start_date = Carbon::parse($booking->check_out_date)->addDays(1)->format("Y-m-d");
                        $nonOverlappingDates[] = ['start_date' => $start_date, 'end_date' => $tariff->end_date];
                    }
                } else {
                    // If there's no overlap, keep the tariff date range as is
                    $nonOverlappingDates[] = ['start_date' => $tariff->start_date, 'end_date' => $tariff->end_date];
                }
            }

            // Merge non-overlapping dates into the availableDates array
            $availableDates = array_merge($availableDates, $nonOverlappingDates);
        }

        return $availableDates;
    }
}
