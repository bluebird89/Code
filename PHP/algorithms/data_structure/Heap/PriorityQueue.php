<?php


namespace Algorithms\data_structure\Heap;

class PriorityQueue extends MaxHeap
{

    public function __construct(int $size)
    {
        parent::__construct($size);
    }

    public function enqueue(int $val)
    {
        parent::insert($val);
    }

    public function dequeue()
    {
        return parent::extractMax();
    }
}

$numbers = [37, 44, 34, 65, 26, 86, 129, 83, 9];
$pq = new PriorityQ(count($numbers));
foreach ($numbers as $number) {
    $pq->enqueue($number);
}
echo "Constructed Heap\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
echo "DeQueued: " . $pq->dequeue() . "\n";
$pq->display();
