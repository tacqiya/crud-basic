use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'productname',
        'categories',
        'description',
        'is_active'
    ];