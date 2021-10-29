function MyString(str){
	this.str=str;
	this.getString=function(){
		return this.str;
	}
	function ltrim(str){
		var i=0;
		while (str.charAt(i)==''){
			++i;
		}
		return str.substring(i,str.length);
	}
	function rtrim(str){
		var i=str.length-1;
		while (str.charAt(i)==''){
			--i;
		}
		return str.substring(0,i+1);
	}
	function trim(str){
		return ltrim(rtrim(str));
	}
	this.str=trim(this.str);
}