<?php

namespace Base;

use \Orders as ChildOrders;
use \OrdersQuery as ChildOrdersQuery;
use \Exception;
use \PDO;
use Map\OrdersTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'orders' table.
 *
 *
 *
 * @method     ChildOrdersQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildOrdersQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildOrdersQuery orderByAddressId($order = Criteria::ASC) Order by the address_id column
 * @method     ChildOrdersQuery orderByRestaurantId($order = Criteria::ASC) Order by the restaurant_id column
 * @method     ChildOrdersQuery orderByValue($order = Criteria::ASC) Order by the value column
 * @method     ChildOrdersQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildOrdersQuery orderByStatus($order = Criteria::ASC) Order by the status column
 *
 * @method     ChildOrdersQuery groupById() Group by the id column
 * @method     ChildOrdersQuery groupByUserId() Group by the user_id column
 * @method     ChildOrdersQuery groupByAddressId() Group by the address_id column
 * @method     ChildOrdersQuery groupByRestaurantId() Group by the restaurant_id column
 * @method     ChildOrdersQuery groupByValue() Group by the value column
 * @method     ChildOrdersQuery groupByDate() Group by the date column
 * @method     ChildOrdersQuery groupByStatus() Group by the status column
 *
 * @method     ChildOrdersQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrdersQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrdersQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrdersQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrdersQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrdersQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrdersQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildOrdersQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildOrdersQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildOrdersQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildOrdersQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildOrdersQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildOrdersQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     ChildOrdersQuery leftJoinAddresses($relationAlias = null) Adds a LEFT JOIN clause to the query using the Addresses relation
 * @method     ChildOrdersQuery rightJoinAddresses($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Addresses relation
 * @method     ChildOrdersQuery innerJoinAddresses($relationAlias = null) Adds a INNER JOIN clause to the query using the Addresses relation
 *
 * @method     ChildOrdersQuery joinWithAddresses($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Addresses relation
 *
 * @method     ChildOrdersQuery leftJoinWithAddresses() Adds a LEFT JOIN clause and with to the query using the Addresses relation
 * @method     ChildOrdersQuery rightJoinWithAddresses() Adds a RIGHT JOIN clause and with to the query using the Addresses relation
 * @method     ChildOrdersQuery innerJoinWithAddresses() Adds a INNER JOIN clause and with to the query using the Addresses relation
 *
 * @method     ChildOrdersQuery leftJoinRestaurants($relationAlias = null) Adds a LEFT JOIN clause to the query using the Restaurants relation
 * @method     ChildOrdersQuery rightJoinRestaurants($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Restaurants relation
 * @method     ChildOrdersQuery innerJoinRestaurants($relationAlias = null) Adds a INNER JOIN clause to the query using the Restaurants relation
 *
 * @method     ChildOrdersQuery joinWithRestaurants($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Restaurants relation
 *
 * @method     ChildOrdersQuery leftJoinWithRestaurants() Adds a LEFT JOIN clause and with to the query using the Restaurants relation
 * @method     ChildOrdersQuery rightJoinWithRestaurants() Adds a RIGHT JOIN clause and with to the query using the Restaurants relation
 * @method     ChildOrdersQuery innerJoinWithRestaurants() Adds a INNER JOIN clause and with to the query using the Restaurants relation
 *
 * @method     \UserQuery|\AddressesQuery|\RestaurantsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildOrders findOne(ConnectionInterface $con = null) Return the first ChildOrders matching the query
 * @method     ChildOrders findOneOrCreate(ConnectionInterface $con = null) Return the first ChildOrders matching the query, or a new ChildOrders object populated from the query conditions when no match is found
 *
 * @method     ChildOrders findOneById(int $id) Return the first ChildOrders filtered by the id column
 * @method     ChildOrders findOneByUserId(int $user_id) Return the first ChildOrders filtered by the user_id column
 * @method     ChildOrders findOneByAddressId(int $address_id) Return the first ChildOrders filtered by the address_id column
 * @method     ChildOrders findOneByRestaurantId(int $restaurant_id) Return the first ChildOrders filtered by the restaurant_id column
 * @method     ChildOrders findOneByValue(double $value) Return the first ChildOrders filtered by the value column
 * @method     ChildOrders findOneByDate(string $date) Return the first ChildOrders filtered by the date column
 * @method     ChildOrders findOneByStatus(int $status) Return the first ChildOrders filtered by the status column *

 * @method     ChildOrders requirePk($key, ConnectionInterface $con = null) Return the ChildOrders by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOne(ConnectionInterface $con = null) Return the first ChildOrders matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders requireOneById(int $id) Return the first ChildOrders filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByUserId(int $user_id) Return the first ChildOrders filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByAddressId(int $address_id) Return the first ChildOrders filtered by the address_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByRestaurantId(int $restaurant_id) Return the first ChildOrders filtered by the restaurant_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByValue(double $value) Return the first ChildOrders filtered by the value column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByDate(string $date) Return the first ChildOrders filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrders requireOneByStatus(int $status) Return the first ChildOrders filtered by the status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrders[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildOrders objects based on current ModelCriteria
 * @method     ChildOrders[]|ObjectCollection findById(int $id) Return ChildOrders objects filtered by the id column
 * @method     ChildOrders[]|ObjectCollection findByUserId(int $user_id) Return ChildOrders objects filtered by the user_id column
 * @method     ChildOrders[]|ObjectCollection findByAddressId(int $address_id) Return ChildOrders objects filtered by the address_id column
 * @method     ChildOrders[]|ObjectCollection findByRestaurantId(int $restaurant_id) Return ChildOrders objects filtered by the restaurant_id column
 * @method     ChildOrders[]|ObjectCollection findByValue(double $value) Return ChildOrders objects filtered by the value column
 * @method     ChildOrders[]|ObjectCollection findByDate(string $date) Return ChildOrders objects filtered by the date column
 * @method     ChildOrders[]|ObjectCollection findByStatus(int $status) Return ChildOrders objects filtered by the status column
 * @method     ChildOrders[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class OrdersQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\OrdersQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Orders', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildOrdersQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildOrdersQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildOrdersQuery) {
            return $criteria;
        }
        $query = new ChildOrdersQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(OrdersTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = OrdersTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrders A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user_id, address_id, restaurant_id, value, date, status FROM orders WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildOrders $obj */
            $obj = new ChildOrders();
            $obj->hydrate($row);
            OrdersTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildOrders|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(OrdersTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(OrdersTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the address_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAddressId(1234); // WHERE address_id = 1234
     * $query->filterByAddressId(array(12, 34)); // WHERE address_id IN (12, 34)
     * $query->filterByAddressId(array('min' => 12)); // WHERE address_id > 12
     * </code>
     *
     * @see       filterByAddresses()
     *
     * @param     mixed $addressId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByAddressId($addressId = null, $comparison = null)
    {
        if (is_array($addressId)) {
            $useMinMax = false;
            if (isset($addressId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ADDRESS_ID, $addressId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($addressId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_ADDRESS_ID, $addressId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_ADDRESS_ID, $addressId, $comparison);
    }

    /**
     * Filter the query on the restaurant_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRestaurantId(1234); // WHERE restaurant_id = 1234
     * $query->filterByRestaurantId(array(12, 34)); // WHERE restaurant_id IN (12, 34)
     * $query->filterByRestaurantId(array('min' => 12)); // WHERE restaurant_id > 12
     * </code>
     *
     * @see       filterByRestaurants()
     *
     * @param     mixed $restaurantId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByRestaurantId($restaurantId = null, $comparison = null)
    {
        if (is_array($restaurantId)) {
            $useMinMax = false;
            if (isset($restaurantId['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_RESTAURANT_ID, $restaurantId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($restaurantId['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_RESTAURANT_ID, $restaurantId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_RESTAURANT_ID, $restaurantId, $comparison);
    }

    /**
     * Filter the query on the value column
     *
     * Example usage:
     * <code>
     * $query->filterByValue(1234); // WHERE value = 1234
     * $query->filterByValue(array(12, 34)); // WHERE value IN (12, 34)
     * $query->filterByValue(array('min' => 12)); // WHERE value > 12
     * </code>
     *
     * @param     mixed $value The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByValue($value = null, $comparison = null)
    {
        if (is_array($value)) {
            $useMinMax = false;
            if (isset($value['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VALUE, $value['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($value['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_VALUE, $value['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_VALUE, $value, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate('2011-03-14'); // WHERE date = '2011-03-14'
     * $query->filterByDate('now'); // WHERE date = '2011-03-14'
     * $query->filterByDate(array('max' => 'yesterday')); // WHERE date > '2011-03-13'
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status > 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(OrdersTableMap::COL_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(OrdersTableMap::COL_USER_ID, $user->getId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdersTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Filter the query by a related \Addresses object
     *
     * @param \Addresses|ObjectCollection $addresses The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByAddresses($addresses, $comparison = null)
    {
        if ($addresses instanceof \Addresses) {
            return $this
                ->addUsingAlias(OrdersTableMap::COL_ADDRESS_ID, $addresses->getId(), $comparison);
        } elseif ($addresses instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdersTableMap::COL_ADDRESS_ID, $addresses->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAddresses() only accepts arguments of type \Addresses or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Addresses relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function joinAddresses($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Addresses');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Addresses');
        }

        return $this;
    }

    /**
     * Use the Addresses relation Addresses object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \AddressesQuery A secondary query class using the current class as primary query
     */
    public function useAddressesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAddresses($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Addresses', '\AddressesQuery');
    }

    /**
     * Filter the query by a related \Restaurants object
     *
     * @param \Restaurants|ObjectCollection $restaurants The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildOrdersQuery The current query, for fluid interface
     */
    public function filterByRestaurants($restaurants, $comparison = null)
    {
        if ($restaurants instanceof \Restaurants) {
            return $this
                ->addUsingAlias(OrdersTableMap::COL_RESTAURANT_ID, $restaurants->getId(), $comparison);
        } elseif ($restaurants instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(OrdersTableMap::COL_RESTAURANT_ID, $restaurants->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByRestaurants() only accepts arguments of type \Restaurants or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Restaurants relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function joinRestaurants($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Restaurants');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Restaurants');
        }

        return $this;
    }

    /**
     * Use the Restaurants relation Restaurants object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \RestaurantsQuery A secondary query class using the current class as primary query
     */
    public function useRestaurantsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRestaurants($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Restaurants', '\RestaurantsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildOrders $orders Object to remove from the list of results
     *
     * @return $this|ChildOrdersQuery The current query, for fluid interface
     */
    public function prune($orders = null)
    {
        if ($orders) {
            $this->addUsingAlias(OrdersTableMap::COL_ID, $orders->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            OrdersTableMap::clearInstancePool();
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(OrdersTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            OrdersTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            OrdersTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // OrdersQuery
