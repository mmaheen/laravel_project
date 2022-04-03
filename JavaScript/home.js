//console.log('hello');
//alert('Welcome');

/*var age = prompt('Hey, What is your Age?');
document.getElementByName('someText').innerHTML = age;*/


let student = {
    name : 'Mugdha',
    age : '27',
    studentInfo : function(){
        return "Your name is : " + this.name +"\n" + "Age is : " + this.age;
    }
};

console.log(student.age);
console.log (student.studentInfo());

var age = prompt ("What is your age?");

if((age>18 && age<28)){
    status = "You are eligible";
}

else{
    status = "you are not elegible";
}

console.log (status);