#!/usr/bin/env bash

# muzi de shell test code
cd /usr/local/var/www/test/System
dir_name=shell_test

if [ ! -d "shell_test" ]; then
    mkdir ${dir_name}
else
    rm -rf shell_test
    mkdir ${dir_name}
fi;

cd shell_test

for ((i = 1; i <=10; i++)) ; do
    touch shell_lg_${i}.log
done;

#shell read only
read_only="this is read only"
readonly read_only

#shell array
shell_array=('tom' 'ali' 'bei' 'you')
echo 'The shell_array first array value: '${shell_array[0]}
array_length=${#shell_array[@]}
echo 'The shell_array length is: '${array_length}
echo 'The shell_array value is: '${shell_array[@]}
echo '-----------------------------------------------------------------------'

#shell string
shell_url='http://www.baidu.com/test.html'
echo 'The string 2 to 8: '${shell_url:2:8}
echo 'The string 5 to end: '${shell_url:5}
echo 'The string first // to end: '${shell_url#*//}
echo 'The string last / to end : '${shell_url##*/}
echo 'The string first / to start: '${shell_url%/*}
echo 'The string last / to start: '${shell_url%%/*}
echo 'The string from -7 to -4: '${shell_url:0-7:3}
echo 'The string from -8 to end: '${shell_url:0-8}
echo '-----------------------------------------------------------------------'

#shell params
echo 'The sh name is: '$0
echo 'The sh first param is: '$1
echo 'The sh params count is: '$#
echo 'The sh params string is: '$*
echo 'The sh params array is: '$@
echo '-----------------------------------------------------------------------'

#shell operator
num_a=10
num_b=20
echo "The numbers sum is: `expr ${num_a} + ${num_b}`"
echo "The numbers subtract is: `expr ${num_a} - ${num_b}`"
echo "The numbers multiply is: `expr ${num_a} \* ${num_b}`"
echo "The numbers division is: `expr ${num_b} / ${num_a}`"
echo "The numbers remainder is: `expr ${num_a} % ${num_b}`"

if [ ${num_a} == ${num_b} ]
then
    echo 'The numbers is eq'
fi

if [ ${num_b} != ${num_a} ]
then
    echo 'The numbers is not eq'
fi

if [ ${num_a} -eq ${num_b} ]
then
    echo 'a -eq b? : a == b'
else
    echo 'a -eq b? : a != b'
fi

if [ ${num_a} -ne ${num_b} ]
then
    echo 'a -ne b? : a != b'
else
    echo 'a -ne b? : a == b'
fi

if [ ${num_a} -gt ${num_b} ]
then
    echo 'a -gt b? : a > b'
else
    echo 'a -gt b? : a < b'
fi

if [ ${num_a} -lt ${num_b} ]
then
    echo 'a -lt b? : a < b'
else
    echo 'a -lt b? : a > b'
fi

if [ ${num_a} -ge ${num_b} ]
then
    echo 'a -ge b? : a >= b'
else
    echo 'a -ge b? : a < b'
fi

if [ ${num_a} -le ${num_b} ]
then
    echo 'a -le b? : a <= b'
else
    echo 'a -le b? : a > b'
fi

if [ ${num_b} -ge 15 -o ${num_a} -gt 100 ]
then
    echo 'b >= 15 -o a > 100 ? : true'
fi

if [ ${num_a} -lt 5 -a ${num_b} -le 15 ]
then
    echo 'a < 5 -a b <= 15 ? : true'
else
    echo 'a < 5 -a b <= 15 ? : false'
fi

if [[ ${num_b} -ge 15 || ${num_a} -gt 100 ]]
then
    echo 'b >= 15 || a > 100 ? : true'
fi

if [[ ${num_a} -lt 5 && ${num_b} -le 15 ]]
then
    echo 'a < 5 && b <= 15 ? : true'
else
    echo 'a < 5 && b <= 15 ? : false'
fi

str_a='abc'
str_b='efg'

if [ -z ${str_a} ]
then
    echo 'str_a is empty?(-z) : true'
else
    echo 'str_a is empty?(-z) : false'
fi

if [ -n ${str_a} ]
then
    echo 'str_a is empty?(-n) : false'
else
    echo 'str_a is empty?(-n) : true'
fi

file='/usr/local/var/www/test/System/shell.sh'
if [ -r ${file} ]
then
    echo 'file -r : file can read'
else
    echo 'file -r : file can not read'
fi

if [ -w ${file} ]
then
    echo 'file -w : file can write'
else
    echo 'file -w : file can not write'
fi

if [ -x ${file} ]
then
    echo 'file -x : file can exec'
else
    echo 'file -x : file can not exec'
fi

if [ -d ${file} ]
then
    echo 'file -d : file is dir'
else
    echo 'file -d : file is not dir'
fi

if [ -f ${file} ]
then
    echo 'file -f : file is file'
else
    echo 'file -f : file is not file'
fi

if [ -e ${file} ]
then
    echo 'file -e : file exist'
else
    echo 'file -e : file not exist'
fi

if [ -s ${file} ]
then
    echo 'file -s : file is not empty'
else
    echo 'file -s : file is empty'
fi
echo '-----------------------------------------------------------------------'

#shell echo
echo 'please input name: '
read name
echo "${name} It is test"
echo -e "ok! \n"
echo -e "ok! \c"
echo "It is ok test"
echo `date`
echo '-----------------------------------------------------------------------'

#shell printf
printf "%-10s %-8s %-4s\n" 姓名 性别 体重kg
printf "%-10s %-8s %-4.2f\n" 木子 男 54.12345
printf "%-10s %-8s %-4.2f\n" 桃子 女 43.12345
echo '-----------------------------------------------------------------------'

#shell flow control
num_c=$[1+2]
num_d=$[2*3]
if test $[num_c] -eq $[num_d]; then
    echo 'c eq d'
else
    echo 'c ne d'
fi

for loop in 1 2 3 4 5 6
do
    echo "The loops value is: ${loop}"
done

int=1
while [ ${int} -lt 5 ]
do
    echo ${int}
    let int++
done

echo '输入<CTRL-D>跳出循环'
echo '输入你喜欢的电影的名字: '
while read FILM
do
    echo "${FILM} 是一部好电影"
    break
done

echo '请输入1-3的数字:'
read input_num
case ${input_num} in
    1)
    echo 'input_num is 1'
    ;;
    2)
    echo 'input_num is 2'
    ;;
    3)
    echo 'input_num is 3'
    ;;
    *)
    echo 'input_num is not 1-3'
    ;;
esac
echo '-----------------------------------------------------------------------'

#shell function
deamofun(){
    echo 'This is my first shell fun'
}
echo '*************fun is start***********'
deamofun
echo '*************fun is end*************'

funwithreturn(){
    echo '请输入第一个数的值:'
    read num_1
    echo '请输入第二个数的值:'
    read num_2
    echo "输入的两个数字分别是 ${num_1} 和 ${num_2}"
    return $[num_1+num_2]
}
funwithreturn
echo "两个数的和为 $? !"
echo '-----------------------------------------------------------------------'

#shell STDIN STDOUT STDERR
cat << EOF
    hello world
    welcome in
    my name is robot
EOF

#shell source file
. ./use_shell.sh
echo ${url}