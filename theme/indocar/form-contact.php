    <form action="<?=$host.'acp/model/contact.php';?>"  method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Tell us your name..." required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Tell us your phone number" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="from" placeholder="Input your email address..." required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Subject:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Write the subject here..." required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" name="message" class="form-control" placeholder="Write message here..." required></textarea>
                        </div>
                    </div>
                    <?=reCaptcha()?>
                    <br>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>