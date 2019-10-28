<?php

class Man {
    private $age;
    private $sex;
    public $name;
    private static $godCounter;

    public function __construct($age = 0, $sex = '', $name = 'unknown')
    {
        $this->age = $age;
        $this->sex = $sex;
        $this->name = $name;
        self::$godCounter++;
    }

    public function getGodCounter() {
        return self::$godCounter;
    }

    public function sleep() {
        return "I'm sleeping";
    }

    public function eat() {
        return "I'm eating";
    }

}

class Student extends Man {

    public $yearOfStudy;

    public function __construct($age = 0, $sex = '', $name = 'unknown', $yearOfStudy = 0)
    {
        parent::__construct($age, $sex, $name);
        $this->yearOfStudy = $yearOfStudy;
    }

    public function learn() {
        return "I'm learning";
    }
}

class Teacher extends Man {

    public $subject;

    public function __construct($age = 0, $sex = '', $name = 'unknown', $subject = 'math')
    {
        parent::__construct($age, $sex, $name);
        $this->subject = $subject;
    }

    public function teach() {
        return "I'm teaching";
    }
}

$man = new Man(42, 'male', 'Ivan');
echo $man->getGodCounter() . "<br>";
$teacher = new Teacher(36,'female', 'Mary', "php");
echo $teacher->getGodCounter() . "<br>";
echo $teacher->teach() . "<br>";

$student = new Student(20, 'female', 'Zara', 2);
echo $student->getGodCounter() . "<br>";
echo $student->learn(). "<br>";



// В примере ниже вызывается объявляется статическая переменная и при вывозе функции любого экземпляра этого класса,
// она уже не инициализируется повторно, а используется все таже переменная, поэтому вывод будет: 1234.
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo();
//$a2->foo();
//$a1->foo();
//$a2->foo();


// В этом примере создается новый класс, через наследование. Тем не менее функция foo у него будет своя,
// и как следствие будет своя статическая переменная, поэтому вывод будет: 1122.
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo();
//$b1->foo();
//$a1->foo();
//$b1->foo();

// Этот пример отличается от предыдущего тем, что при создании экземпляра класса опущены скобки,
// но в данном случае, т.к. конструктору передавать нечего, то PHP считает, что там есть пустые скобки.
// Насколько я смог понять, нигде в официальной документации это не указано.
// Ну а вывод такой же как и в предыдущем примере: 1122.
//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
//$a1->foo();
//$b1->foo();
//$a1->foo();
//$b1->foo();