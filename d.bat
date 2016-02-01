#set aname = “abc”

#ref http://stackoverflow.com/questions/394230/detect-the-os-from-a-bash-script answered Dec 26 '08 at 20:36 
#aname=“abc”
aname=`uname`
#echo $aname

#ref https://bobcopeland.com/blog/2012/10/goto-in-bash/
function kill_process {

	label=$1
	
	#echo label is $label
	echo ${@}

	chrome=`ps gx | grep -E 'MacOS/Google Chrome'$`
	#chrome=`ps gx | grep 'MacOS/Google Chrome'`
	
	#ref http://incorrectcode.news/question/165432/equivalent-of-60file602c-60line60-in-bash/
	#echo chrome => '$chrome'
	#echo chrome is '$chrome'
	echo "[$0:$LINENO] $chrome"
	#echo chrome is "$chrome"

	#ref http://stackoverflow.com/questions/918886/how-do-i-split-a-string-on-a-delimiter-in-bash asked May 28 '09 at 2:03
	arr=$(echo $chrome | tr " " "\n")
	
	echo $arr

	echo [$0:$LINENO] arr[2] is ${arr[2]}	#=> blank

	# count
	count=0
	
	#ref http://stackoverflow.com/questions/918886/how-do-i-split-a-string-on-a-delimiter-in-bash
	for x in $arr
	do
		#$count += 1
		#$count+=1
		#(($count+=1))
		
		#ref http://askubuntu.com/questions/385528/how-to-increment-a-variable-in-bash answered Dec 3 '13 at 16:39
		((count+=1))
		
	done

	echo count is $count
	
	#####################
	
		# for-loop with index
	
	#####################
	value="Chrome"
	
	echo ${!arr[@]}
	
	#ref http://stackoverflow.com/questions/15028567/bash-array-get-index-from-value answered Feb 22 '13 at 16:30 
	#ref http://www.cyberciti.biz/faq/bash-comment-out-multiple-line-code/
/*
	for i in "${!arr[@]}"; do
	   if [[ "${arr[$i]}" = "${value}" ]]; then
	       echo "${i}";
	   fi
	done
*/

	#ref http://www.cyberciti.biz/faq/bash-iterate-array/

	total=${#arr[*]}
	
	echo [$0:$LINENO] total is $total

	for var in "${arr[@]}"
	do
	  echo "[$0:$LINENO] ${var}"
	  # do something on $var
	done
	
	total=${#arr[*]}
	
	echo total is $total

	#echo arr[2] is ${arr[2]}	#=> blank
	#echo arr[2] is ${#arr[2]}	#=> 0	
	echo arr[2] is ${arr[2]}	#=> blank	
	echo arr[3] is ${arr[3]}	#=> 
	
}

function kill_process_2 {

	#label="MacOS/Google Chrome$"

	label=$1

	echo [$0:$LINENO] 'label' is "$label"

	chrome=`ps gx | grep -E "$label"`
	#chrome=`ps gx | grep -E '$label'`
	#chrome=`ps gx | grep -E 'MacOS/Google Chrome$'`
	#chrome=`ps gx | grep -E 'MacOS/Google Chrome'$`

	echo [$0:$LINENO] 'chrome' is ""$chrome""

	# validate
	if [[ "$chrome" == "" ]]; then	#=> w (ref http://stackoverflow.com/questions/7225745/why-is-my-bash-string-comparison-of-two-identical-strings-always-false answered Aug 29 '11 at 3:42
#	if [[ "$chrome"=="" ]]; then
	#if [ chrome=="" ]; then
	#if [ $chrome="" ]; then
	#if [[ $chrome=="" ]]; then
	#if [ $chrome=="" ]; then
	
		echo [$0:$LINENO] 'chrome' is blank
		echo [$0:$LINENO] 'chrome' is $chrome
		
		return
	
#	else
#	
#		echo [$0:$LINENO] NOT blank
	fi

	#ref http://stackoverflow.com/questions/918886/how-do-i-split-a-string-on-a-delimiter-in-bash asked May 28 '09 at 2:03
	arr=$(echo $chrome | tr " " "\n")
	
	#echo $arr

	#ref http://www.thegeekstuff.com/2010/06/bash-array-tutorial/ "4. Length of the Bash Array"
#	echo count is "${#arr[@]}"

	#ref http://stackoverflow.com/questions/1951506/bash-add-value-to-array-without-specifying-a-key answered Dec 23 '09 at 9:02
	ary=()

	for x in $arr
		do
			ary+=($x)
			#ary+=(x)
		done

#	echo $ary	#=> 2939
#	echo ${ary[@]}	#=> 2939 ?? S 0:17.93 /Applications/Google Chrome.app/Contents/MacOS/Google Chrome
#	echo ${ary[3]}	#=> 0:17.97
	
	echo kill ${ary[0]}
	kill ${ary[0]}
	

}
#kill_process_2

#if [“$aname” == ‘Darwin’]; then
#if [ “$aname” == ‘Darwin’ ]; then	#=> false
if [ “$aname”==‘Darwin’ ]; then	#=> true
	echo “DARWIN yes”

	kill_process_2 "MacOS/Google Chrome$"
	kill_process_2 "Contents/MacOS/filezilla$"
	
	kill_process_2 "Contents\/MacOS\/Wish"
	
	kill_process_2 "Contents\/MacOS\/sqlitebrowser"
	
	#kill_process_2 "Contents¥/MacOS¥/filezilla$"
	
	#kill_process_2
	#kill_process	ddddd

else

	echo “NOT”
fi


echo “done”

#/*
#========== bash scripts ==========
# list of running apps	#ref 
#osascript -e 'tell application "System Events" to get name of (processes where background only is false)'



#*/