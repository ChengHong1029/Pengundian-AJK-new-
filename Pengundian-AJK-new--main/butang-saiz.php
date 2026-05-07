<style>

/* =========================
   BUTTON STYLE
========================= */
.saiz-btn,
input[type="button"],
button{

    padding: 8px 14px;

    font-size: 14px;

    background-color: #FC6C85;

    color: #fff;

    border: none;

    border-radius: 6px;

    cursor: pointer;

    margin-right: 5px;

    transition: 0.3s;
}

.saiz-btn:hover,
input[type="button"]:hover,
button:hover{

    background-color: #F25278;

    transform: translateY(-2px);
}

/* container */
.saiz-container{

    display: flex;

    align-items: center;

    gap: 6px;

    flex-wrap: wrap;
}

</style>

<!-- =========================
     FONT SIZE FUNCTION
========================= -->
<script>

let baseSize = 16;

function ubahsaiz(gandaan){

    const body = document.body;

    if(gandaan === 2){

        baseSize = 16;

    } else {

        baseSize += (gandaan * 2);

        if(baseSize < 12) baseSize = 12;

        if(baseSize > 28) baseSize = 28;
    }

    body.style.fontSize = baseSize + "px";
}

</script>

<!-- =========================
     BUTTON UI
========================= -->
<div class="saiz-container">

    | ubah saiz tulisan |

    <input type="button" value="Reset" onclick="ubahsaiz(2)">

    <input type="button" value="+" onclick="ubahsaiz(1)">

    <input type="button" value="-" onclick="ubahsaiz(-1)">

    |

    <button onclick="window.print()">Cetak</button>

</div>