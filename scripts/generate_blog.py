import sys
import json
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.chrome.service import Service
from webdriver_manager.chrome import ChromeDriverManager
import time

# Laravel سے topic لو
title = sys.argv[1]

# Chrome options
options = webdriver.ChromeOptions()
options.add_argument("--headless")  # invisible browser
options.add_argument("--disable-gpu")
options.add_argument("--no-sandbox")

driver = webdriver.Chrome(service=Service(ChromeDriverManager().install()), options=options)

try:
    # ChatGPT free website
    driver.get("https://chat.openai.com/chat")
    
    # تھوڑی wait کریں login یا page load کے لیے
    time.sleep(15)  # اگر پہلے login نہیں تو manually login کریں browser میں

    # Chat box locate کریں
    chat_box = driver.find_element(By.TAG_NAME, "textarea")

    # Message type کریں
    chat_box.send_keys(f"Write a fully original blog post about '{title}' in HTML format with <h1>, <h2>, <p>, <ul>, <li>")
    chat_box.send_keys(Keys.ENTER)

    # تھوڑی wait کریں response آنے کے لیے
    time.sleep(20)

    # Latest message حاصل کریں
    messages = driver.find_elements(By.CSS_SELECTOR, "div.markdown")  # chat messages
    last_message = messages[-1].text if messages else ""

    # Output JSON Laravel کے لیے
    print(json.dumps({"content": last_message}))

finally:
    driver.quit()
