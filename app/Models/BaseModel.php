<?php
/**
 * Created by PhpStorm.
 * User: SonLe
 * Date: 17/12/2016
 * Time: 10:27 AM
 */

namespace App\Models;

use \Config AS Config;
use League\Flysystem\Exception;
use \Session AS Session;
use DB;

abstract class BaseModel {

	protected $_object;
	protected static $instance;

	public function __construct(){}

	/**
	 * @return static
	 */
	public static function getInstance()
	{
		if (!isset(static::$instance[static::class])) {
			static::$instance[static::class] = new static();
		}

		return static::$instance[static::class];
	}

	/*
	 * Static function get all
	 * Return all record of table
	 *
	 * */

	public static function selectAll($cols = [])
	{
		try{
			$table =  self::getInstance()->_object;

			if( count($cols) == 0) {
				return DB::table($table)->get();
			}

			return DB::table($table)
					->select($cols)
					->get();
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}

	}


	/*
	 * Static function get all paginate
	 * input
	 * $cols =  ['id', 'name', 'age']
	 * $skip = int
	 * $take = int
	 * Return all record of table
	 *
	 * */

	public static function selectAllPaging($cols = [], $skip = 0, $take = 10)
	{
		try{
			$table =  self::getInstance()->_object;

			if( count($cols) == 0) {
				return DB::table($table)
						->skip($skip)
						->take($take)
						->get();
			}

			return DB::table($table)
					->select($cols)
					->skip($skip)
					->take($take)
					->get();
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}

	}

	/*
	 * Select condition
	 * Input
	 * where  = array ['id' => 1, 'name' => 'LAS', 'age' => 26 ]
	 * Columns = array ['id', 'name', 'age']
	 * return  array[]
	 */

	public static function selectWhere($where = [], $cols = [], $orderBy = false ){

		try{
			$table =  self::getInstance()->_object;

			if($orderBy !== false){
				if( count($cols) == 0) {
					return DB::table($table)
							->where($where)
							->orderBy($orderBy[0], $orderBy[1])
							->get();
				}

				return DB::table($table)
						->select($cols)
						->where($where)
						->orderBy($orderBy[0], $orderBy[1])
						->get();
			} else {
				if( count($cols) == 0) {
					return DB::table($table)
							->where($where)
							->get();
				}

				return DB::table($table)
						->select($cols)
						->where($where)
						->get();
			}


		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}

	}

	/*
	 * Select condition
	 * Input
	 * where  = array ['id' => 1, 'name' => 'LAS', 'age' => 26 ]
	 * Columns = array ['id', 'name', 'age']
	 * $skip = int
	 * $take = int
	 * return  array[]
	 */

	public static function selectWherePaging($where = [], $cols = [], $skip = 0, $take = 10){

		try{
			$table =  self::getInstance()->_object;

			if( count($cols) == 0) {
				return DB::table($table)
						->where($where)
						->skip($skip)
						->take($take)
						->get();
			}

			return DB::table($table)
					->select($cols)
					->where($where)
					->skip($skip)
					->take($take)
					->get();
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}

	}


	/*
	 * Save return newest ID
	 * Input
	 * data =  array ['id' => 1, 'name' => 'LAS', 'age' => 26 ]
	 * Output array[]
	 */

	public static function saveId($data = []){

		try{
			$table =  self::getInstance()->_object;

			if( count($data) == 0) {
				return 0;
			}

			return DB::table($table)
					->insertGetId($data);
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}


	}

	/*
	 * delete by columns
	 * input whereCols = ['id' => 1, 'name' => 'LAS', 'age' =>26]
	 * Output 0 or 1
	 */

	public static function delete($whereCols = []){

		try{
			$table =  self::getInstance()->_object;

			if( count($whereCols) == 0) {
				return 0;
			}

			return DB::table($table)
					->where($whereCols)
					->delete();
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}


	}

	/*
	 * Update
	 * input
	 * 	data = ['id' => 1, 'name' => 'LAS', 'age' =>26]
	 * 	whereCols = ['id' => 1]
	 * Output
	 */

	public static function update($data = [], $where = []){

		try{
			$table =  self::getInstance()->_object;

			if( count($data) == 0 && count($where)) {
				return 0;
			}

			return DB::table($table)
					->where($where)
					->update($data);
		} catch(Exception $e){
			return ['code' => 1, 'msg' => $e->getMessage() ];
		}


	}


}