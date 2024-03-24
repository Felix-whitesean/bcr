from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

# Sample responses (replace with your own logic)
responses = {
  "hello": "Hi there! How can I help you today?",
  "how are you": "I'm doing well, thanks for asking!",
  "anything else": "Sure, what else can I do for you?"
}

@app.route("/")
def home():
  return render_template("index.html")


@app.route("/messages/", methods=["POST"])
def chat():
  # Get user message from request
  user_message = request.json["message"]

  # Get response based on user message (replace with your logic)
  response = responses.get(user_message.lower(), "Sorry, I don't understand.")

  # Return JSON response
  return jsonify({"message": response})

if __name__ == "__main__":
  app.run(debug=True)