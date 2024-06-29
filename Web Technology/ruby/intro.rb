# puts "hello world"
# p "hello world"
# print "hello world"
# load 'hello.rb'

# COMMENTS
# single line comment
=begin
multi
line
comment
=end

# # VARIABLES
# name = "John"
# age = 21
# male = true
# puts "Hello #{name}, you are #{age} years old and you are #{male ? 'male' : 'female'} "


# # USER INPUT
# print "Enter your name: "
# name = gets.chomp

# print "Enter your age: "
# age = gets.chomp.to_i

# puts "Hello #{name}, your age is #{age}"

# # STRINGS
# str1 = "this is a string"
# str2 = "this is another string"
# puts str1
# puts str2

# # MULTILINE STRINGS
# str3 = "this is
# a multiline
# string"
# puts str3

# str4 = %/this
# is also
# a multiline
# string/
# puts str4

# str5 = 'hello'
# puts str5.size
# puts str5.length
# puts str5.upcase
# puts str5.downcase
# puts str5.reverse.upcase

# puts str5.include? "he"
# puts str5.include? "hey"

# puts "hello " "this is " "string concatenation" " 1"
# puts "hello " + "this is " + "string concatenation" + " 2"
# puts "hello".concat(" this is concat()").concat(" function")

# str6 = "hi"
# puts str6
# str6 = str6 << " freezing"
# str6.freeze
# # str6 = str6 << "freezed"

# puts "abs" == 'pqr'
# puts 'abc'.eql? 'abc'

# str7 = 'ruby is great'
# puts str7[0]
# puts str7[-3]
# puts str7[0, 5]
# puts str7[-4..-1]
# puts str7[0..6]

# OPERATORS
# =, -, *, /, %, **, ==, !=, >=, <=, >, <
# ternary operator- ? :

# ARRAYS

# arr1 = [1,2,3,4]
# arr2 = Array.new(10)

# puts arr1.size
# puts arr2.length

# puts arr1[3]
# puts arr1.at(1)
# puts arr1.at(10)
# puts arr1.at(-1)

# puts arr1.fetch(1)
# # puts arr1.fetch(10)

# puts arr1.first
# puts arr1.last

# puts arr1.take(3)

# arr1.push(-10)
# p arr1
# arr1 << 99
# arr1 << 99
# arr1 << 99
# p arr1
# arr1.unshift(99)
# p arr1
# arr1.insert(3, 100)
# p arr1

# p arr1.drop(2)
# p arr1.pop
# p arr1.shift
# p arr1.delete(3)
# p arr1

# p arr1.uniq

# # HASHES - dictionary/map
# hash1 = {"name" => "AK", "subject" => "WT", "age" => 21}
# p hash1
# puts hash1.size

# hash2 = {"name" : "AK", "subject" : "WT", "age" : 21}
# p hash2
# puts hash2.size

# puts hash1["name"], hash1["age"]
# hash1.each do|k, v|
#     puts "#{k}: #{v}"
# end

# IF-ELSE:

# print "Enter age: "
# age = gets.chomp.to_i
# if age >= 18
#     puts "eligible"
# else
#     puts "not eligible"
# end

# print "enter marks: "
# marks = gets.chomp.to_i
# if marks < 30
#     puts "D"
# elsif marks < 50
#     puts "C"
# elsif marks < 80
#     puts "B"
# else
#     puts "A"
# end

# CASE - switch case
# print "Enter day: "
# day = gets.chomp.to_i

# case day
# when 1
#     puts "Monday"
# when 2
#     puts "Tuesday"
# when 3
#     puts "Wednesday"
# when 4
#     puts "Thursday"
# when 5
#     puts "Friday"
# else
#     puts "Holiday"
# end

# FOR LOOP

# for i in 1..10
#     print "#{i}, "
# end

# for i in ['m', 't', 'w']
#     puts i
# end

# WHILE LOOP

# x = 1
# while x <= 10 do
#     p x
#     x += 1
# end

# DO-WHILE LOOP

# loop do
#     puts "Enter a number greater than 10"
#     num = gets.chomp.to_i
#     if num > 10
#         puts "Number is #{num}"
#     else
#         puts "Bye..."
#         break
#     end
# end

# UNTIL AND UNLESS

# i = 1
# until i == 11
#     puts i
#     i += 2
# end

# x = 30
# unless x <= 5
#     puts "x >= 5"
# else
#     puts "x < 5"
# end

# BREAK AND NEXT

# x = 1
# while x <= 10
#     if x % 2 == 0
#         puts "even"
#         x += 1
#         next
#     end
#     if x == 7
#         break
#     end
#     puts x
#     x += 1
# end

# REDO AND RETRY

# x = 1
# while x < 5
#     puts x
#     x += 1
#     redo if x == 5
# end

# for i in 1..10
#     begin
#         puts i
#         raise if i == 10
#     rescue
#         retry
#     end
# end

# METHODS / FUNCTIONS

# () not compulsory
# def hello
#     puts "good morning!"
# end

# hello

# def getDetails(id)
#     puts "Enter details of #{id}: "
#     name = gets.chomp
#     return name
# end

# CLASSES AND OBJECTS

class Car
    @name
    @model
    @topspeed
    @@count = 0

    def initialize(name, model, topspeed)
        @name = name
        @model = model
        @topspeed = topspeed
        @@count += 1
    end

    def setName(name)
        @name = name
    end

    def getName
        puts "car name is #{@name}"
    end
end

c1 = Car.new('mercedes', 2020, 200)
# c1.setName("toyota")
c1.getName


# puts "name is " + getDetails(2)

