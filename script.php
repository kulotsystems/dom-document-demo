<?php

    $doc  = new DOMDocument();
    $file = 'index.html';
    if($doc->loadHTMLFile($file)) {
        // reference counter element and value
        $spanCounter = $doc->getElementById('counter');
        $count = intval($spanCounter->textContent);

        // perform operation
        if(isset($_POST['minus']))
            $count -= 1;
        else if(isset($_POST['plus']))
            $count += 1;

        // write new counter value
        $spanCounter->nodeValue = $count;
        $doc->saveHTMLFile($file);

        // redirect to index.html
        header('location: index.html');
    }
    else
        echo "File <b>$file</b> not found.";