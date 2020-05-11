<?php

	$fgc = file_get_contents("https://www.keydobot.com/kelimeler.php");
	$json = json_decode($fgc);
    $kelimeler=$json->kelimeler;
    $alfabe = explode(":","A:B:C:Ç:D:E:F:G:Ğ:H:I:İ:J:K:L:M:N:O:Ö:P:R:S:Ş:T:U:Ü:V:Y:Z");

    $harfler=[];
    function harfUret(){
        
        global $harfler;
        global $alfabe;
        for($i=0;$i<9;$i++){
		    $random=rand(0,28);
		    $harfler[$i]=$alfabe[$random];
        }
        var_dump($harfler);
    }
    harfUret();

	function anlamliTest($kelime){
 		
		global $kelimeler;
        $kelime = implode("",$kelime);
        $kelime = mb_strtolower($kelime);	

        if (in_array($kelime, $kelimeler)) {
		    echo "<br><b>Bulunan kelime: </b>".$kelime;
		    exit;
		}
    }

    for($harfSayi = 8 ; $harfSayi >= 3 ; $harfSayi--){

        $tempHarfler = $harfler;
        $temp = ["","","","","","","",""];

        for( $i=0 ; $i<8 ; $i++ )
        {
            $temp[0] = $tempHarfler[$i];
            array_splice($tempHarfler, $i, 1);
            for( $j=0 ; $j<7 ; $j++ )
            {
                $tempHarfler2 = $tempHarfler;
                $temp[1] = $tempHarfler2[$j];
                array_splice($tempHarfler2, $j, 1);
                for( $k=0 ; $k<6 ; $k++ )
                {
                    $tempHarfler3 = $tempHarfler2;
                    $temp[2] = $tempHarfler3[$k];
                    if($harfSayi == 3){
                        anlamliTest($temp);
                    }else{
                        array_splice($tempHarfler3, $k, 1);
                        for( $m=0 ; $m<5 ; $m++ )
                        {
                            $tempHarfler4 = $tempHarfler3;
                            $temp[3] = $tempHarfler4[$m];
                            if($harfSayi == 4){
                                anlamliTest($temp);
                            }else{
                                array_splice($tempHarfler4, $m, 1);
                                for( $n=0 ; $n<4 ; $n++ )
                                {
                                    $tempHarfler5 = $tempHarfler4;
                                    $temp[4] = $tempHarfler5[$n];
                                    if($harfSayi == 5){
                                        anlamliTest($temp);
                                    }else{
                                        array_splice($tempHarfler5, $n, 1);
                                        for( $p=0 ; $p<3 ; $p++ )
                                        {
                                            $tempHarfler6 = $tempHarfler5;
                                            $temp[5] = $tempHarfler6[$p];
                                            if($harfSayi == 6){
                                                anlamliTest($temp);
                                            }else{
                                                array_splice($tempHarfler6, $p, 1);
                                                for( $r=0 ; $r<2 ; $r++ )
                                                {
                                                    $tempHarfler7 = $tempHarfler6;
                                                    $temp[6] = $tempHarfler7[$r];
                                                    if($harfSayi == 7){
                                                        anlamliTest($temp);
                                                    }else{
                                                        array_splice($tempHarfler7, $r, 1);
                                                        for( $s=0 ; $s<1 ; $s++ )
                                                        {
                                                            $temp[7] = $tempHarfler7[$s];
                                                            anlamliTest($temp);
                                                        }
                                                    }
                                                    $tempHarfler7 = $tempHarfler6;
                                                }
                                            }
                                            $tempHarfler6 = $tempHarfler5;
                                        }
                                    }
                                    $tempHarfler5 = $tempHarfler4;
                                }
                            }
                            $tempHarfler4 = $tempHarfler3;
                        }
                    }
                    $tempHarfler3 = $tempHarfler2;
                }
                $tempHarfler2 = $tempHarfler;
            }
            $tempHarfler = $harfler;
        }
    }

?>