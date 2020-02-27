<template>
    <div class="row">
        <div class="d-flex justify-content-center col-md-12">
            <div class="first-step second-step">
                <div class="flex flex-column mb-4 mt-4">
                    <div class="d-flex justify-content-between">
                        <span class="step-title">STEP 1</span>
                    </div>
                    <div>
                        <span>Read carefully all the terms and conditions.</span>
                    </div>
                </div>
                <div class="flex flex-column mb-4 mt-4">
                    <div class="terms-step" id="terms-step">
                        <div class="text-center pt-3 pb-3">
                            <h2 class="text-muted font-weight-normal">Terms & Condition</h2>
                        </div>
                        <div class="text-center p-left-3 p-right-3">
                            <p class="text-justify">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis tempore veritatis illum facilis blanditiis illo incidunt a laudantium. Dignissimos reprehenderit esse quidem asperiores quo. Enim eum fugit nam optio ipsam?
                            </p>
                            <ul class="text-justify ml-3">
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsa dolorem sapiente repellendus ut atque error omnis unde, quaerat at quia quidem odio ullam quis accusantium nostrum repudiandae perferendis explicabo.</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, ab eum qui harum provident temporibus magnam quae nobis eligendi nam cumque! Adipisci, pariatur. Molestiae impedit architecto perferendis veritatis fuga voluptatem!</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsa dolorem sapiente repellendus ut atque error omnis unde, quaerat at quia quidem odio ullam quis accusantium nostrum repudiandae perferendis explicabo.</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, ab eum qui harum provident temporibus magnam quae nobis eligendi nam cumque! Adipisci, pariatur. Molestiae impedit architecto perferendis veritatis fuga voluptatem!</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ipsa dolorem sapiente repellendus ut atque error omnis unde, quaerat at quia quidem odio ullam quis accusantium nostrum repudiandae perferendis explicabo.</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, ab eum qui harum provident temporibus magnam quae nobis eligendi nam cumque! Adipisci, pariatur. Molestiae impedit architecto perferendis veritatis fuga voluptatem!</li>
                            </ul>
                            <p class="text-justify">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis tempore veritatis illum facilis blanditiis illo incidunt a laudantium. Dignissimos reprehenderit esse quidem asperiores quo. Enim eum fugit nam optio ipsam?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button @click="$emit('accepted')" type="button" class="btn btn-dark btn-modern btn-outline rounded-0 py-2 px-4">Agree & Continue</button>
                </div>
            </div>
        </div>
    </div>
</template>
