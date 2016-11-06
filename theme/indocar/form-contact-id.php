    <form action="<?=$host.'acp/model/contact.php';?>"  method="post">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nama Lengkap:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Anda..." required>
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>No Handphone:</label>
                            <input type="text" class="form-control" name="phone" placeholder="Nomor Handphone Anda..." required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Alamat Email:</label>
                            <input type="email" class="form-control" name="from" placeholder="Tulis alamat email Anda..." required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Judul Pesan:</label>
                            <input type="text" class="form-control" name="subject" placeholder="Tulis judul pesan Anda..." required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Isi Pesan:</label>
                            <textarea rows="10" cols="100" name="message" class="form-control" placeholder="Tulis pesan Anda disini..." required></textarea>
                        </div>
                    </div>
                    <?=reCaptcha()?>
                    <br>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>