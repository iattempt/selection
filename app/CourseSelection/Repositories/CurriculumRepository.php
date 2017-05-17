<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Model\Curriculum;

class CurriculumRepository extends BaseRepository
{
    private static $Instance;
    static function instance()
    {
        if (self::$Instance === null)
            self::$Instance = new CurriculumRepository();
        return self::$Instance;
    }
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    private function __construct()
    {
        $this->model = $this->model === null ? null : Curriculum::all();
    }

    /**
     * return static
     * */
    function all()
    {
        if (!$this->model)
            return null;
        return $this->model->sortBy('course_id');
    }

    function own($id)
    {
        if (!$this->model)
            return null;
        return $this->model->where('student_id', $id);
    }
}
