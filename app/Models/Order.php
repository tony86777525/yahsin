<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /*
     * created_at
     * updated_at
     * */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    // database name
    protected $connection = 'yh';

    // default value
    protected $attributes = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'payment_number',
        'payment_type',
        'status',
        'amount',
        'name',
        'email',
        'country',
        'lang',
        'recipient_name',
        'recipient_company_name',
        'recipient_address_nation',
        'recipient_address_country',
        'recipient_address_code',
        'recipient_address',
        'recipient_tel',
        'recipient_email',
        'google_drive_folder_id',
        'payment_times',
        'created_at_date',
    ];

    const STATUS_NEW = 0;
    const STATUS_UNPAID = 1;
    const STATUS_PAID = 2;
    const STATUS_CLOSED = 3;

    const STATUS_OPTIONS = [
        self::STATUS_NEW => '新訂單',
        self::STATUS_UNPAID => '待付款',
        self::STATUS_PAID => '已付款',
        self::STATUS_CLOSED => '已結單'
    ];

    const PAYMENT_TYPE_NO = 0;
    const PAYMENT_TYPE_ECPAY = 1;
    const PAYMENT_TYPE_PAYPAL = 2;
    const PAYMENT_TYPE_OPTIONS = [
        self::PAYMENT_TYPE_NO => '無',
        self::PAYMENT_TYPE_ECPAY => '綠界',
        self::PAYMENT_TYPE_PAYPAL => 'Paypal'
    ];

    const COUNTRY_CHINESE_CIRCLE = 0;
    const COUNTRY_ASIA = 1;
    const COUNTRY_OTHER = 2;

    const COUNTRY_OPTIONS = [
        self::COUNTRY_CHINESE_CIRCLE => '台港澳中',
        self::COUNTRY_ASIA => '亞洲',
        self::COUNTRY_OTHER => '其他',
    ];

    const PRICE = 9800;

    public function getCreatedAtAttribute($value)
    {
//        $d = new \DateTime();
//        $d->setTime(0,0, 0, strtotime($value));
//        return $d->format('Y-m-d H:i:s');
        return date('Y-m-d H:i:s', strtotime($value));
    }

    public function getCountryDisplayAttribute()
    {
        return self::COUNTRY_OPTIONS[$this->country];
    }

    public function getStatusOptionsAttribute($value)
    {
        return self::STATUS_OPTIONS[$value];
    }
}
