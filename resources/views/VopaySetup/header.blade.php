<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Zpayd Documentation</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
    }
    
    .header {
        width: 100%;
        background-color: #000000;
        border-bottom: 1px solid #2a2a2a;
        position: sticky;
        top: 0;
        z-index: 1000;
      
    }
    
    .hero_hder {
        width: 100%;
        height: 70px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 24px;
    }
    
    .site_tittle {
        color: #ffffff;
        font-size: 32px;
        font-weight: 700;
        letter-spacing: 1.5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    
    .site_tittle::after {
      
        font-size: 14px;
        background: linear-gradient(135deg, #ff7e5f, #feb47b);
        color: #000;
        padding: 4px 10px;
        border-radius: 20px;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-left: 10px;
    }
    
    .righters {
        display: flex;
        align-items: center;
        gap: 20px;
    }
    
    .righters button {
        padding: 8px 20px;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(37, 117, 252, 0.3);
    }
    
    .righters button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 117, 252, 0.4);
    }
    
    .righters i.dark-icon {
        font-size: 22px;
        color: #ffffff;
        cursor: pointer;
        transition: all 0.3s ease;
        background: #1a1a1a;
        padding: 10px;
        border-radius: 50%;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .righters i.dark-icon:hover {
        color: #ffc371;
        transform: rotate(15deg);
        background: #2a2a2a;
    }
    
    .secound_header {
        width: 100%;
        height: 50px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0 24px;
        background-color: #0a0a0a;
        border-top: 1px solid #2a2a2a;
    }
    
    .link_box {
        display: flex;
        flex-direction: row;
        gap: 8px;
    }
    
    .link {
        color: #cccccc;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .link:hover {
        color: #ffffff;
        background-color: #2a2a2a;
    }
    
    .link:first-child {
        color: #6a11cb;
        background-color: rgba(106, 17, 203, 0.1);
        font-weight: 600;
    }
    
.search_box {
   
    width: 280px;
    display: flex;
    align-items: center; /* vertically center everything */
}

.search_box input {
    flex: 1;
    height: 40px;
    padding-left: 36px; /* leave space for icon */
    
    border-radius: 8px;
    border: 1px solid #3a3a3a;
    background-color: #1a1a1a;
    color: #fff;
    font-size: 14px;
    outline: none;
}

.search_box i {
    position: absolute;
    left: -12px !important;
    font-size: 16px;
    color: #888;
    pointer-events: none;
     margin-left: -31px;
     margin-right: 10px;
   
}
 
    .search_box input:focus {
        border-color: #6a11cb;
        box-shadow: 0 0 0 3px rgba(106, 17, 203, 0.2);
    }
    
    .search_box input::placeholder {
        color: #888;
    }
 
    /* Active link indicator */
    .link.active {
        color: #ffffff;
        background-color: #2a2a2a;
        position: relative;
    }
    
    .link.active::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 50%;
        transform: translateX(-50%);
        width: 20px;
        height: 3px;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        border-radius: 2px;
    }
    
    /* Responsive design */
    @media (max-width: 1024px) {
        .search_box {
            width: 200px;
        }
    }
    
    @media (max-width: 768px) {
        .hero_hder, .secound_header {
            padding: 0 16px;
        }
        
        .site_tittle {
            font-size: 28px;
        }
        
        .link_box {
            overflow-x: auto;
            padding-bottom: 4px;
        }
        
        .link_box::-webkit-scrollbar {
            height: 4px;
        }
        
        .link_box::-webkit-scrollbar-track {
            background: #1a1a1a;
        }
        
        .link_box::-webkit-scrollbar-thumb {
            background: #3a3a3a;
            border-radius: 4px;
        }
        
        .search_box {
            width: 180px;
        }
    }
</style>
<body>
    <div class="header">
       <div class="hero_hder">
            <div class="site_tittle">Zpayd</div>
            <div class="righters">
                <button>Login</button>
                <i class="fa-regular fa-moon dark-icon"></i>
            </div>
       </div>
       
       <div class="secound_header">
            <div class="link_box">
                <div class="link active"><i class="fas fa-code-branch"></i><label>v2.0</label></div>
                <div class="link"><i class="fas fa-book"></i><label>Guides</label></div>
                <div class="link"><i class="fas fa-utensils"></i><label>Recipes</label></div>
                <div class="link"><i class="fas fa-code"></i><label>API Reference</label></div>
                <div class="link"><i class="fas fa-history"></i><label>Changelog</label></div>
            </div>

            <div class="search_box">
                <input type="text" placeholder="Search documentation...">
               <i class="fa-solid fa-search"></i>
            </div>
        </div>
    </div>
    
   

    
</body>
</html>