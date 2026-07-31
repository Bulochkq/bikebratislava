<?php get_header(); ?>


    <!-- HERO SECTION -->
    <section
        class="relative min-h-[75<select id="ride-type" name="ride-type" style="display: none !important;">
                                    <option value="" disabled selected>Select type</option>
                                    <option value="Not sure - help me choose">Not sure - help me choose</option>
                                    <?php
                                    $tours_query = new WP_Query(array('post_type' => 'tour', 'posts_per_page' => -1, 'order' => 'ASC'));
                                    if ($tours_query->have_posts()) :
                                        while ($tours_query->have_posts()) : $tours_query->the_post();
                                    ?>
                                    <option value="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></option>
                                    <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    endif;
                                    ?>
                                    <option value="Custom Experience">Custom Experience</option>
                                </select><select id="ride-type" name="ride-type" style="display: none !important;">
                                    <option value="" disabled selected>Select type</option>
                                    <option value="Not sure — help me choose">Not sure — help me choose</option>
                                    <option value="Bratislava Highlights Ride">Bratislava Highlights Ride</option>
                                    <option value="Danube Discovery Tour">Danube Discovery Tour</option>
                                    <option value="Wine & Villages Ride">Wine & Villages Ride</option>
                                    <option value="Sunset Ride">Sunset Ride</option>
                                    <option value="Cross Border Ride">Cross Border Ride</option>
                                    <option value="Little Carpathians Road Ride">Little Carpathians Road Ride</option>
                                    <option value="Gravel Through The Vineyards">Gravel Through The Vineyards</option>
                                    <option value="Four Countries Challenge">Four Countries Challenge</option>
                                    <option value="Custom Experience">Custom Experience</option>
                                </select>
                                <button type="button"
                                    class="custom-select-trigger w-full text-left bg-stone-50 border border-stone-200 focus:border-red-600 focus:bg-white focus:outline-none text-sm font-light text-brand-luxeTextDark tracking-wide p-3.5 shadow-sm cursor-pointer flex justify-between items-center transition-all duration-300">
                                    <span class="selected-text text-stone-400">Select type</span>
                                    <i data-lucide="chevron-down"
                                        class="w-4 h-4 text-brand-luxeGold transition-transform duration-300"></i>
                                </button>
                                <div
                                    class="custom-select-options absolute left-0 right-0 mt-1.5 bg-white border border-brand-luxeGold/20 shadow-2xl opacity-0 pointer-events-none transition-all duration-300 z-30 flex flex-col py-1.5 rounded-none max-h-60 overflow-y-auto" data-lenis-prevent>
                                    <div class="custom-option ride-option-help px-5 py-2.5 text-xs font-semibold text-brand-luxeGold bg-brand-luxeGold/5 border-l-2 border-brand-luxeGold hover:bg-brand-luxeGold/10 hover:pl-7 cursor-pointer transition-all duration-300 flex items-center gap-2"
                                        data-value="Not sure - help me choose"><i data-lucide="sparkles"
                                            class="w-3.5 h-3.5"></i>Not sure - help me choose</div>
                                    
                                    <?php
                                    $categories = get_terms(array('taxonomy' => 'tour_category', 'hide_empty' => false));
                                    foreach($categories as $cat):
                                        $tours_in_cat = new WP_Query(array(
                                            'post_type' => 'tour', 
                                            'posts_per_page' => -1, 
                                            'order' => 'ASC',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'tour_category',
                                                    'field'    => 'term_id',
                                                    'terms'    => $cat->term_id,
                                                ),
                                            ),
                                        ));
                                        if ($tours_in_cat->have_posts()):
                                    ?>
                                    <div class="px-5 py-2 text-[9px] font-bold tracking-[0.2em] text-red-600 uppercase bg-stone-50/80 border-y border-stone-100 cursor-default pointer-events-none mt-1"><?php echo esc_html($cat->name); ?></div>
                                    <?php
                                            while ($tours_in_cat->have_posts()) : $tours_in_cat->the_post();
                                    ?>
                                    <div class="custom-option px-5 py-2.5 text-xs font-light text-stone-600 hover:bg-brand-luxeGold/5 hover:text-brand-luxeGold hover:pl-7 cursor-pointer transition-all duration-300"
                                        data-value="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></div>
                                    <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        endif;
                                    endforeach;
                                    ?>
                                    <div class="px-5 py-2 text-[9px] font-bold tracking-[0.2em] text-red-600 uppercase bg-stone-50/80 border-y border-stone-100 cursor-default pointer-events-none mt-1">Other</div>
                                    <div class="custom-option px-5 py-2.5 text-xs font-light text-stone-600 hover:bg-brand-luxeGold/5 hover:text-brand-luxeGold hover:pl-7 cursor-pointer transition-all duration-300"
                                        data-value="Custom Experience">Custom Experience</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Ride Type live preview -->
                    <div id="ride-preview" class="hidden"></div>

                    <!-- Message -->
                    <div class="flex flex-col">
                        <label for="message"
                            class="text-[9px] font-bold uppercase tracking-[0.2em] text-stone-500 mb-2 pl-1">Message</label>
                        <textarea id="message" name="message" rows="7" data-lenis-prevent
                            placeholder="Tell us about your interests, rental needs, or special requests..."
                            class="bg-stone-50 border border-stone-200 focus:border-red-600 focus:bg-white focus:outline-none text-sm font-light text-brand-luxeTextDark tracking-wide p-3.5 shadow-sm transition-all duration-300 resize-none"></textarea>
                    </div>

                    <!-- GDPR Consent -->
                    <div class="flex items-start gap-3 pt-2">
                        <div class="flex items-center h-5 mt-1">
                            <input id="gdpr-consent" name="gdpr-consent" type="checkbox" required
                                class="w-4 h-4 border border-stone-300 rounded-none bg-stone-50 focus:ring-3 focus:ring-brand-luxeGold/30 accent-brand-luxeGold cursor-pointer transition-colors duration-300">
                        </div>
                        <label for="gdpr-consent" class="text-xs font-light text-stone-600 leading-relaxed font-sans cursor-pointer">
                            I agree to the <a href="privacy" target="_blank" class="text-brand-luxeGold hover:underline font-medium">processing of my personal data</a> for the purpose of handling this inquiry, in accordance with European GDPR regulations. <span class="text-red-600">*</span>
                        </label>
                    </div>

                    <p class="text-[10px] text-stone-400 font-light tracking-wide pl-1 editable"><span class="text-red-600">*</span> Required field</p>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="group relative w-full overflow-hidden border border-brand-luxeDark/20 bg-brand-luxeDark py-5 px-8 text-center text-xs font-medium uppercase tracking-[0.3em] transition-all duration-500 rounded-none shadow-2xl">
                        <!-- Absolute gold background overlay that slides up -->
                        <span
                            class="absolute inset-0 w-full h-full bg-brand-luxeGold transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-out z-0"></span>
                        <!-- Relative text content to stay above overlay -->
                        <span
                            class="relative z-10 text-white group-hover:text-brand-luxeDark transition-colors duration-500 flex items-center justify-center space-x-2"
                            id="submit-btn-text">
                            <span>Submit Inquiry</span>
                        </span>
                    </button>
                </form>

                <!-- Success State Overlay -->
                <div id="success-message"
                    class="absolute inset-0 bg-brand-luxeDark text-white z-20 flex flex-col items-center justify-center p-8 text-center opacity-0 pointer-events-none transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-brand-luxeGold/20 border border-brand-luxeGold rounded-none flex items-center justify-center text-brand-luxeGold mb-6">
                        <i data-lucide="check" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-serif text-3xl font-light tracking-tight mb-4 editable">Inquiry Received</h3>
                    <p
                        class="max-w-md text-stone-400 font-light text-xs md:text-sm leading-relaxed mb-8 tracking-wide font-sans editable">
                        Thank you for reaching out to Bike Bratislava. One of our local ride leaders will review your
                        request and get back to you within 24 hours to help plan your adventure.
                    </p>
                    <button id="success-reset-btn"
                        class="px-8 py-3.5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[10px] tracking-[0.25em] uppercase transition-colors duration-300 rounded-none">
                        Send Another Message
                    </button>
                </div>

                <!-- Error State Overlay -->
                <div id="error-message"
                    class="absolute inset-0 bg-brand-luxeDark text-white z-20 flex flex-col items-center justify-center p-8 text-center opacity-0 pointer-events-none transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-brand-luxeGold/20 border border-brand-luxeGold rounded-none flex items-center justify-center text-brand-luxeGold mb-6">
                        <i data-lucide="triangle-alert" class="w-8 h-8"></i>
                    </div>
                    <h3 class="font-serif text-3xl font-light tracking-tight mb-4 editable">Something Went Wrong</h3>
                    <p id="error-message-text"
                        class="max-w-md text-stone-400 font-light text-xs md:text-sm leading-relaxed mb-6 tracking-wide font-sans editable">
                        We couldn't send your inquiry right now. Please try again in a moment.
                    </p>
                    <p class="max-w-md text-stone-400 font-light text-xs md:text-sm leading-relaxed mb-8 tracking-wide font-sans">
                        You can also reach us directly at
                        <a href="mailto:silvia@velocity.sk" class="text-brand-luxeGold hover:underline font-medium">silvia@velocity.sk</a>
                        or <a href="tel:+421903214013" class="text-brand-luxeGold hover:underline font-medium whitespace-nowrap">+421 903 214 013</a>.
                    </p>
                    <button id="error-retry-btn"
                        class="px-8 py-3.5 bg-brand-luxeGold hover:bg-brand-luxeGoldDark text-white font-medium text-[10px] tracking-[0.25em] uppercase transition-colors duration-300 rounded-none">
                        Back To The Form
                    </button>
                </div>
            </div>

        </div>
    </section>

    <?php get_footer(); ?>
