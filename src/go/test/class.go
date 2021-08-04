package main

import "fmt"

type Factory interface {
	ProductCar()
}

type Seller struct {
	tool string
}

type Car struct {
	Price  float64
	Color  string
	owner  string // 非大写开头，只能在包里使用
	Seller        // 继承Factory
}

func (car *Car) From() string {
	return "come from: china, " + car.Color
}

// 同包里可以有多个初始化init()，按顺序编译执行
func init() {
	fmt.Println("init 1...")
}

func init() {
	fmt.Println("init 2...")
}

//func main() {
//	// 单双引号的区别
//	// 双引号是用来表示字符串string，其实质是一个byte类型的数组，单引号表示rune类型。
//	// 还有一个反引号，用来创建原生的字符串字面量，它可以由多行组成，但不支持任何转义序列。
//	// 因此，当把两个不同类型的变量进行拼接时，就会报错。
//
//	// 这3种初始化的区别
//	car1 := Car{10.11, "red", "meng", Seller{"abc"}}
//	car1.owner = "juan"
//	car2 := Car{Price: 20.11, Color: "yellow"}
//	car3 := new(Car)
//	car3.Price = 30.11
//	car3.Color = "pink"
//	var car4 Car
//	fmt.Println(car1, car2, car3, car4)
//}
