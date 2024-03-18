<?php


require '../Model/consultasbd.php';

$overwrite = $_GET['overwrite'] ?? '';

$alumnes_SMX1_1 = 0;
$alumnes_SMX1_2 = 0;
$alumnes_SMX1_3 = 0;
$alumnes_SMX1_4 = 0;
$alumnes_SMX2_1 = 0;
$alumnes_SMX2_2 = 0;
$alumnes_1ASIX = 0;
$alumnes_2ASIX = 0;
$alumnes_1DAW = 0;
$alumnes_2DAW = 0;


if (grupoCreado() !== 0) {

    if ($overwrite === "yes") {
        eliminarGrups();
        netejarAlumnes();
        generarGrups();
    } else {

        echo "<script type='text/javascript'>alert('No s'han sobreescrit els grups ');</script>";
        header('refresh:0.01; url=sessio.php');
    }
}
else generarGrups();


include "sessio.php";


function generarGrups()
{

    if (alumnesSMX1_1() < 10) {
        generarGrup('SMX1-1A');
        $grupid = buscarGrup('SMX1-1A');
        $arrayAlumnes = buscarAlumnes("SMX1-1");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_1() < 20) {
        generarGrup('SMX1-1A');
        generarGrup('SMX1-1B');
        $grupid = buscarGrup('SMX1-1B');
        $grupid2 = buscarGrup('SMX1-1A');
        $arrayAlumnes = buscarAlumnes("SMX1-1");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_1() < 30) {
        generarGrup('SMX1-1A');
        generarGrup('SMX1-1B');
        generarGrup('SMX1-1C');
        $grupid = buscarGrup('SMX1-1C');
        $grupid2 = buscarGrup('SMX1-1B');
        $grupid3 = buscarGrup('SMX1-1A');
        $arrayAlumnes = buscarAlumnes("SMX1-1");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < (count($arrayAlumnes) / 3) * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = (count($arrayAlumnes) / 3) * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
        
    }

    if (alumnesSMX1_2() < 10) {
        generarGrup('SMX1-2A');
        $grupid = buscarGrup('SMX1-2A');
        $arrayAlumnes = buscarAlumnes("SMX1-2");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_2() < 20) {
        generarGrup('SMX1-2A');
        generarGrup('SMX1-2B');
        $grupid = buscarGrup('SMX1-2B');
        $grupid2 = buscarGrup('SMX1-2A');
        $arrayAlumnes = buscarAlumnes("SMX1-2");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_2() < 30) {
        generarGrup('SMX1-2A');
        generarGrup('SMX1-2B');
        generarGrup('SMX1-2C');
        $grupid = buscarGrup('SMX1-2C');
        $grupid2 = buscarGrup('SMX1-2B');
        $grupid3 = buscarGrup('SMX1-2A');
        $arrayAlumnes = buscarAlumnes("SMX1-2");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < (count($arrayAlumnes) / 3) * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = (count($arrayAlumnes) / 3) * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnesSMX1_3() < 10) {
        generarGrup('SMX1-3A');
        $grupid = buscarGrup('SMX1-3A');
        $arrayAlumnes = buscarAlumnes("SMX1-3");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_3() < 20) {
        generarGrup('SMX1-3A');
        generarGrup('SMX1-3B');
        $grupid = buscarGrup('SMX1-3B');
        $grupid2 = buscarGrup('SMX1-3A');
        $arrayAlumnes = buscarAlumnes("SMX1-3");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_3() < 30) {
        generarGrup('SMX1-3A');
        generarGrup('SMX1-3B');
        generarGrup('SMX1-3C');
        $grupid = buscarGrup('SMX1-3C');
        $grupid2 = buscarGrup('SMX1-3B');
        $grupid3 = buscarGrup('SMX1-3A');
        $arrayAlumnes = buscarAlumnes("SMX1-3");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < (count($arrayAlumnes) / 3) * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = (count($arrayAlumnes) / 3) * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnesSMX1_4() < 10) {
        generarGrup('SMX1-4A');
        $grupid = buscarGrup('SMX1-4A');
        $arrayAlumnes = buscarAlumnes("SMX1-4");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_4() < 20) {
        generarGrup('SMX1-4A');
        generarGrup('SMX1-4B');
        $grupid = buscarGrup('SMX1-4B');
        $grupid2 = buscarGrup('SMX1-4A');
        $arrayAlumnes = buscarAlumnes("SMX1-4");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX1_4() < 30) {
        generarGrup('SMX1-4A');
        generarGrup('SMX1-4B');
        generarGrup('SMX1-4C');
        $grupid = buscarGrup('SMX1-4C');
        $grupid2 = buscarGrup('SMX1-4B');
        $grupid3 = buscarGrup('SMX1-4A');
        $arrayAlumnes = buscarAlumnes("SMX1-4");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < (count($arrayAlumnes) / 3 * 2); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnesSMX2_1() < 10) {
        generarGrup('SMX2-1A');
        $grupid = buscarGrup('SMX2-1A');
        $arrayAlumnes = buscarAlumnes("SMX2-1");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX2_1() < 20) {
        generarGrup('SMX2-1A');
        generarGrup('SMX2-1B');
        $grupid = buscarGrup('SMX2-1B');
        $grupid2 = buscarGrup('SMX2-1A');
        $arrayAlumnes = buscarAlumnes("SMX2-1");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX2_1() < 30) {
        generarGrup('SMX2-1A');
        generarGrup('SMX2-1B');
        generarGrup('SMX2-1C');
        $grupid = buscarGrup('SMX2-1C');
        $grupid2 = buscarGrup('SMX2-1B');
        $grupid3 = buscarGrup('SMX2-1A');
        $arrayAlumnes = buscarAlumnes("SMX2-1");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnesSMX2_2() < 10) {
        generarGrup('SMX2-2A');
        $grupid = buscarGrup('SMX2-2A');
        $arrayAlumnes = buscarAlumnes("SMX2-2");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX2_2() < 20) {
        generarGrup('SMX2-2A');
        generarGrup('SMX2-2B');
        $grupid = buscarGrup('SMX2-2B');
        $grupid2 = buscarGrup('SMX2-2A');
        $arrayAlumnes = buscarAlumnes("SMX2-2");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnesSMX2_2() < 30) {
        generarGrup('SMX2-2A');
        generarGrup('SMX2-2B');
        generarGrup('SMX2-2C');
        $grupid = buscarGrup('SMX2-2C');
        $grupid2 = buscarGrup('SMX2-2B');
        $grupid3 = buscarGrup('SMX2-2A');
        $arrayAlumnes = buscarAlumnes("SMX2-2");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnes1ASIX() < 10) {
        generarGrup('1ASIXA');
        $grupid = buscarGrup('1ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX1");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes1ASIX() < 20) {
        generarGrup('1ASIXA');
        generarGrup('1ASIXB');
        $grupid = buscarGrup('1ASIXB');
        $grupid2 = buscarGrup('1ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX1");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes1ASIX() < 30) {
        generarGrup('1ASIXA');
        generarGrup('1ASIXB');
        generarGrup('1ASIXC');
        $grupid = buscarGrup('1ASIXC');
        $grupid2 = buscarGrup('1ASIXB');
        $grupid3 = buscarGrup('1ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX1");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnes2ASIX() < 10) {
        generarGrup('2ASIXA');
        $grupid = buscarGrup('2ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX2");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes2ASIX() < 20) {
        generarGrup('2ASIXA');
        generarGrup('2ASIXB');
        $grupid = buscarGrup('2ASIXB');
        $grupid2 = buscarGrup('2ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX2");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes2ASIX() < 30) {
        generarGrup('2ASIXA');
        generarGrup('2ASIXB');
        generarGrup('2ASIXC');
        $grupid = buscarGrup('2ASIXC');
        $grupid2 = buscarGrup('2ASIXB');
        $grupid3 = buscarGrup('2ASIXA');
        $arrayAlumnes = buscarAlumnes("ASIX2");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnes1DAW() < 10) {
        generarGrup('1DAWA');
        $grupid = buscarGrup('1DAWA');
        $arrayAlumnes = buscarAlumnes("DAW1");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes1DAW() < 20) {
        generarGrup('1DAWA');
        generarGrup('1DAWB');
        $grupid = buscarGrup('1DAWB');
        $grupid2 = buscarGrup('1DAWA');
        $arrayAlumnes = buscarAlumnes("DAW1");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes1DAW() < 30) {
        generarGrup('1DAWA');
        generarGrup('1DAWB');
        generarGrup('1DAWC');
        $grupid = buscarGrup('1DAWC');
        $grupid2 = buscarGrup('1DAWB');
        $grupid3 = buscarGrup('1DAWA');
        $arrayAlumnes = buscarAlumnes("DAW1");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }

    if (alumnes2DAW() < 10) {
        generarGrup('2DAWA');
        $grupid = buscarGrup('2DAWA');
        $arrayAlumnes = buscarAlumnes("DAW2");
        for ($i = 0; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes2DAW() >= 10 && alumnes2DAW() < 20) {
        generarGrup('2DAWA');
        generarGrup('2DAWB');
        $grupid = buscarGrup('2DAWB');
        $grupid2 = buscarGrup('2DAWA');
        $arrayAlumnes = buscarAlumnes("DAW2");
        for ($i = 0; $i < count($arrayAlumnes) / 2; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
    } else if (alumnes2DAW() >= 20 && alumnes2DAW() < 30){
        generarGrup('2DAWA');
        generarGrup('2DAWB');
        generarGrup('2DAWC');
        $grupid = buscarGrup('2DAWC');
        $grupid2 = buscarGrup('2DAWB');
        $grupid3 = buscarGrup('2DAWA');
        $arrayAlumnes = buscarAlumnes("DAW2");
        for ($i = 0; $i < count($arrayAlumnes) / 3; $i++) {
            setIdAlumne($grupid, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3; $i < count($arrayAlumnes) / 3 * 2; $i++) {
            setIdAlumne($grupid2, $arrayAlumnes[$i]['email']);
        }
        for ($i = count($arrayAlumnes) / 3 * 2; $i < count($arrayAlumnes); $i++) {
            setIdAlumne($grupid3, $arrayAlumnes[$i]['email']);
        }
    }
}
