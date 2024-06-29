
x = 1
while x < 5
    puts x
    x += 1
    redo if x == 5
end

for i in 1..10
    begin
        puts i
        raise if i == 10
    rescue
        retry
    end
end
