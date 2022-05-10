<?php 
function filtrarinput($post){
    if(!is_array($post)){
        return validaString($post);
    }
    foreach ($post as $key => $value) {
        if(is_array($value)){
            return $post;
        }
        $post[$key] = validaString($value);
    }
    return $post;
}
function validaString($str){
    $tmp = strtolower($str);
    $filtrado = filtraValor($tmp);
    if($tmp != $filtrado){
        return $filtrado.' Comentário filtrado';
    }else{
        return $str;
    }

}
function filtraValor($valor_f){
    $valor_f = str_replace("--", "",$valor_f);
	$valor_f = str_replace("\"", "",$valor_f);
	$valor_f = str_replace("'", "",$valor_f);
	//$valor_f = str_replace(":", "",$valor_f);
	$valor_f = str_replace("//..", "",$valor_f);
	$valor_f = str_replace("passwd", "",$valor_f);
	$valor_f = str_replace("&&", "",$valor_f);
	$valor_f = str_replace("//\\", "",$valor_f);
	$valor_f = str_replace("window.", "",$valor_f);
	$valor_f = str_replace(".xml", "",$valor_f);
	$valor_f = str_replace("/.", "",$valor_f);
	$valor_f = str_replace("//", "",$valor_f);
	$valor_f = str_ireplace("($", "",$valor_f);
	$valor_f = str_replace("/etc/", "",$valor_f);
	$valor_f = str_ireplace("$)", "",$valor_f);
	$valor_f = str_ireplace("X-CRLF-", "",$valor_f);
	$valor_f = str_ireplace(".txt", "",$valor_f);
	$valor_f = str_ireplace("^", "",$valor_f);
	$valor_f = str_ireplace(": no", "",$valor_f);
    $valor_f = str_ireplace(": yes", "",$valor_f);
    $valor_f = str_ireplace(":no", "",$valor_f);
    $valor_f = str_ireplace(":yes", "",$valor_f);
	$valor_f = str_ireplace(".md5", "",$valor_f);
	$valor_f = str_ireplace("/?", "",$valor_f);
    $valor_f = str_ireplace(".log", "",$valor_f);
	$valor_f = str_ireplace("]]", "",$valor_f);
	$valor_f = str_ireplace("(())", "",$valor_f);
	$valor_f = str_ireplace("</textarea>", "",$valor_f);
	$valor_f = str_ireplace("'\"", "",$valor_f);
	$valor_f = str_ireplace("/proc/", "",$valor_f);
	$valor_f = str_ireplace("<!", "",$valor_f);
	$valor_f = str_ireplace("<textarea>", "",$valor_f);
	$valor_f = str_ireplace("<!--", "",$valor_f);
	$valor_f = str_ireplace("script:;", "",$valor_f);
    $valor_f = str_ireplace("script:\"", "",$valor_f);
    $valor_f = str_ireplace("\";", "",$valor_f);
    $valor_f = str_ireplace("';", "",$valor_f);
    $valor_f = str_ireplace("javascript:", "",$valor_f);
    $valor_f = str_ireplace("sink()", "",$valor_f);
    $valor_f = str_ireplace("_namespace", "",$valor_f);
    $valor_f = str_ireplace(",x:", "",$valor_f);
    $valor_f = str_ireplace("_js_", "",$valor_f);
    $valor_f = str_ireplace(",y:", "",$valor_f);
    $valor_f = str_ireplace("</script><script>", "",$valor_f);
    $valor_f = str_ireplace("1\"", "",$valor_f);
    $valor_f = str_ireplace(";print", "",$valor_f);
    $valor_f = str_ireplace("response.write", "",$valor_f);
    $valor_f = str_ireplace("import time", "",$valor_f);
    $valor_f = str_ireplace("thread.sleep", "",$valor_f);
    $valor_f = str_ireplace("/etc/", "",$valor_f);
    $valor_f = str_ireplace("/self/env", "",$valor_f);
    $valor_f = str_ireplace("file:///", "",$valor_f);
    $valor_f = str_ireplace("web.xml", "",$valor_f);
    $valor_f = str_ireplace("';.\")", "",$valor_f);
    $valor_f = str_ireplace("/bin/cat", "",$valor_f);
    $valor_f = str_ireplace("../", "",$valor_f);
    $valor_f = str_ireplace("pg_sleep", "",$valor_f);
    $valor_f = str_ireplace(";waitfor delay", "",$valor_f);

	return $valor_f;
	};

?>