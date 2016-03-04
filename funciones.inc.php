<?php


// para cambiar permisos en directorio y archivos
function chmod_R($path, $filemode, $dirmode) { 
    if (is_dir($path) ) { 
        if (!chmod($path, $dirmode)) { 
            $dirmode_str=decoct($dirmode); 
            print "Failed applying filemode '$dirmode_str' on directory '$path'\n"; 
            print "  `-> the directory '$path' will be skipped from recursive chmod\n"; 
            return; 
        } 
        $dh = opendir($path); 
        while (($file = readdir($dh)) !== false) { 
            if($file != '.' && $file != '..') {  // skip self and parent pointing directories 
                $fullpath = $path.'/'.$file; 
                chmod_R($fullpath, $filemode,$dirmode); 
            } 
        } 
        closedir($dh); 
    } else { 
        if (is_link($path)) { 
            print "link '$path' is skipped\n"; 
            return; 
        } 
        if (!chmod($path, $filemode)) { 
            $filemode_str=decoct($filemode); 
            print "Failed applying filemode '$filemode_str' on file '$path'\n"; 
            return; 
        } 
    } 
} 




?>
