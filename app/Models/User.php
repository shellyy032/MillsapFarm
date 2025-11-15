namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id_user';
    public $incrementing = true;

    protected $fillable = [
        'nama_pengguna',
        'email',
        'password',
        'id_role',
        'id_divisi',
    ];

    protected $hidden = ['password'];

    // Relasi
    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role', 'id_role');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'id_divisi', 'id_divisi');
    }
}
