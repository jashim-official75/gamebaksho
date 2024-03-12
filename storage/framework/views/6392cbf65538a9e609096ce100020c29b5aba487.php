<div wire:ignore.self class="modal fade" id="subscription_pop" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth modal_width" role="document">
        <div class="modal-content bg">
            <section id="subscriptionModal">
                <div>
                    <div class="header_title">
                        <div>Xoss.games</div>
                        <span>Subscription Plan</span>
                    </div>
                    <div class="choose_plan">
                        <h5 class="h5">Choose a plan</h5>
                        <div class="plan_cards">
                            <div class="plan_card">
                                <section>
                                    <h5>Daily</h5>
                                    <small>3tk/-</small>
                                    <div class="package">
                                        <div>
                                            <label for=""></label>
                                            <span>1 day</span>
                                        </div>
                                        <div>
                                            <label for=""></label>
                                            <span>All Game Access</span>
                                        </div>
                                          <div>
                                <label for=""></label>
                                <span>Auto Renewal</span>
                            </div>
                                    </div>
                                    <button data-dismiss="modal" data-toggle="modal" data-target="#signup"
                                        wire:click="daily">Subscribe Now</button>
                                </section>
                            </div>
                            <div class="plan_card">
                                <section>
                                    <h5>Weekly</h5>
                                    <small>9.99tk/-</small>
                                    <div class="package">
                                        <div>
                                            <label for=""></label>
                                            <span>7 days</span>
                                        </div>
                                        <div>
                                            <label for=""></label>
                                            <span>All Game Access</span>
                                        </div>
                                          <div>
                                <label for=""></label>
                                <span>Auto Renewal</span>
                            </div>
                                    </div>
                                    <button data-dismiss="modal" data-toggle="modal" data-target="#signup"
                                        wire:click="weekly">Subscribe Now</button>
                                </section>
                            </div>
                            <div class="plan_card" id="lastCard">
                                <section>
                                    <h5>Monthly</h5>
                                    <small>39.99tk/-</small>
                                    <div class="package">
                                        <div>
                                            <label for=""></label>
                                            <span>30 days</span>
                                        </div>
                                        <div>
                                            <label for=""></label>
                                            <span>All Game Access</span>
                                        </div>
                                          <div>
                                <label for=""></label>
                                <span>Auto Renewal</span>
                            </div>
                                    </div>
                                    <button data-dismiss="modal" data-toggle="modal" data-target="#signup"
                                        wire:click="monthly">Subscribe Now</button>
                                </section>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/livewire/frontend/subscription-package.blade.php ENDPATH**/ ?>