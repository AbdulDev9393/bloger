@extends('VopaySetup.main')

@push('styles')
<style>
    h1 {
        color: black;
        margin-bottom: 16px;
    }

    .abdu-url-box {
        width: 530px;
        display: flex;
        align-items: center;
        gap: 12px;
        
        padding: 10px 16px;
        border-radius: 8px;
        flex-wrap: wrap;
        margin-bottom: 12px;
    }

  .abdu-url-box button {
    font-family: 'Poppins', 'Segoe UI', Tahoma, sans-serif;
    font-size: 12px;
    font-weight: 600;
    border-radius: 8px;
    padding: 6px 16px;
    border: none;
    background: linear-gradient(135deg, #6a11cb, #2575fc);
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
   
}

.abdu-url-box button:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0, 0, 0, 0.2);
}
    .abdu-link {
        font-family: monospace;
        color: #333;
        overflow-x: auto;
        flex: 1;
    }

    .abdu-copy-btn {
        cursor: pointer;
        color: #384248;
        border: 1px solid #ccc;
        border-radius: 6px;
        padding: 6px 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        transition: all 0.3s ease;
        min-width: 36px;
        min-height: 36px;
    }

    .abdu-copy-btn i {
        color: #6a11cb;
        font-size: 16px;
    }

    /* Hide copy icon when copied */
    .abdu-copy-btn.copied i {
        display: none;
    }

    /* Show checkmark */
    .abdu-copy-btn.copied::after {
        content: "✓";
        color: green;
        font-weight: bold;
        font-size: 16px;
     
        display: block;
    }
    .leftbox{
        width: 600px;
    }
    .api-descrition{
        color: black;
        margin-bottom: 30px;
    }
    .form{
        width: 90%;
        height: auto;
      
    }
    .form h4{
        color: #384248;
    }
    .form-box-cantanir{
        width: 95%;
        height: auto;
       border: 1px solid rgb(212, 212, 212);
       background-color: #eeeded;
       border-radius: 7px;
    margin: 15px;
    }
 .input-box{
    width: 100%;
    height: auto;          /* 40px hatao */
    display: flex;
    color: #384248;
    flex-direction: column; /* ⭐ ye main fix hai */
}

    .inputlable{
        padding: 8px;
        font-size: 15px;
    }
    .typelable{
        padding-top: 13px;
        font-size: 12px;
        color: #637288;
    }
    .requiredlable{
          padding-top: 13px;
        font-size: 12px;
        color: red;
        padding-left: 5px;
    }
.hed_line{
    width: 100%;
    color: #637288;
    font-size: 13px;
    padding: 0 10px 8px 10px;
}
  .info_data{
    display: flex;
    flex-direction: row;
}
   .form-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.left-info {
    width: 65%;
}

.input_box_api {
    width: 35%;
    padding: 10px;
}

.input_box_api input {
    width: 100%;
    padding: 6px 8px;
}
.input_box_api input {
    width: 100%;
    padding: 6px 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: border 0.2s ease, box-shadow 0.2s ease;
}

/* ON FOCUS */
.input_box_api input:focus {
    border-color: #018ef5;
    box-shadow: 0 0 0 3px rgba(1, 142, 245, 0.25);
}
.response-dropdown {

   width: 86%;
    margin-top: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    background-color: #eeeded;
    margin-left: 14px;
}

.response-dropdown summary {
    padding: 8px 10px;
    cursor: pointer;
    list-style: none;
    font-size: 14px;
}

/* remove default arrow */
.response-dropdown summary::-webkit-details-marker {
    display: none;
}

/* focus / open effect */
.response-dropdown[open] summary {
    border-bottom: 1px solid #e0e0e0;
    color: #018ef5;
}

.response-dropdown ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.response-dropdown li {
    padding: 8px 10px;
    font-size: 13px;
    cursor: pointer;
}

.response-dropdown li:hover {
    background-color: #f3f7ff;
}
.response-dropdown summary {
    padding: 8px 12px;
    cursor: pointer;
    list-style: none;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* icon */
.dropdown-icon {
    transition: transform 0.25s ease;
    color: #637288;
}

/* rotate when open */
.response-dropdown[open] .dropdown-icon {
    transform: rotate(90deg);
    color: #018ef5;
}
.update-line{
    padding-top: 15px;
    color: #637288;
}
.main-page{
    display: flex;
    flex-direction: row;
}
.right-box{
    display: flex;
    flex-direction: column;
    position: fixed;
    margin-left: 45%;
    width: 380px;
}
.right_page {
    position: absolute;   /* ✅ absolute */
    width: 380px;
      height: 220px;
    background-color: #303b42;
    border-radius: 7px;
    padding: 10px;
    color: white;
      overflow: hidden;  
}
.right_page:nth-child(1) {
    top: 0;
}

.right_page:nth-child(2) {
    top: 240px;   /* height ke hisaab se adjust */
}

.right_page h3{
    padding: 5px;
    margin-top: 10px;
}
.right_page p{
    font-size: 12px;
    width: 90%;
    margin: auto;
    padding: 5px;
    text-align: justify;  
    line-height: 1.5; 
     max-height: 140px;          /* ✅ content area height */
    overflow-y: auto;     
}
.right_page p::-webkit-scrollbar {
    width: 7px;
}

/* scrollbar track */
.right_page p::-webkit-scrollbar-track {
    background: rgba(0, 0, 0, 0.15);
    border-radius: 10px;
}

/* scrollbar thumb (BLUR BLACK) */
.right_page p::-webkit-scrollbar-thumb {
    background: rgba(28, 67, 241, 0.55);   /* soft black */
    border-radius: 10px;
    backdrop-filter: blur(4px);       /* blur effect */
}

/* hover effect */
.right_page p::-webkit-scrollbar-thumb:hover {
    background: rgba(5, 21, 75, 0.75);
}
</style>
@endpush

@section('content')
@include('VopaySetup.contentpage')

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>
<script>
function abduCopyURL(button) {
    // Reset all buttons: remove 'copied' class
    document.querySelectorAll('.abdu-copy-btn').forEach(btn => btn.classList.remove('copied'));

    // Get URL text from sibling .abdu-link
    const urlDiv = button.parentElement.querySelector('.abdu-link');
    const urlText = urlDiv.innerText;

    // Copy to clipboard
    navigator.clipboard.writeText(urlText).then(() => {
        // Show tick on clicked button
        button.classList.add('copied');

        // Remove tick after 2 seconds
        setTimeout(() => {
            button.classList.remove('copied');
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy: ', err);
    });
}
</script>
@endpush