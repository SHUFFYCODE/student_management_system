<?php

namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table = 'grades';
    protected $primaryKey = 'grade_id';
    protected $allowedFields = ['student_id', 'subject', 'grade'];
}
