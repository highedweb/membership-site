<?php /* Smarty version 2.6.27, created on 2013-10-29 22:07:48
         compiled from string:%7Bif+%24receipt_text%7D%0A%7B%24receipt_text%7D%0A%7B/if%7D%0A%7Bif+%24is_pay_later%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24pay_later_receipt%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Belse%7D%0A%0A%7Bts%7DPlease+print+this+receipt+for+your+records.%7B/ts%7D%0A%7B/if%7D%0A%0A%7Bif+%24membership_assign+%26%26+%21%24useForMember%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DMembership+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DMembership+Type%7B/ts%7D:+%7B%24membership_name%7D%0A%7Bif+%24mem_start_date%7D%7Bts%7DMembership+Start+Date%7B/ts%7D:+%7B%24mem_start_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24mem_end_date%7D%7Bts%7DMembership+End+Date%7B/ts%7D:+%7B%24mem_end_date%7CcrmDate%7D%0A%7B/if%7D%0A%0A%7B/if%7D%0A%7Bif+%24amount%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DMembership+Fee%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bif+%21%24useForMember+%26%26+%24membership_amount+%26%26+%24is_quick_config%7D%0A%7Bts+1%3D%24membership_name%7D%251+Membership%7B/ts%7D:+%7B%24membership_amount%7CcrmMoney%7D%0A%7Bif+%24amount%7D%0A%7Bif+%21+%24is_separate_payment+%7D%0A%7Bts%7DContribution+Amount%7B/ts%7D:+%7B%24amount%7CcrmMoney%7D%0A%7Belse%7D%0A%7Bts%7DAdditional+Contribution%7B/ts%7D:+%7B%24amount%7CcrmMoney%7D%0A%7B/if%7D%0A%7B/if%7D%0A-------------------------------------------%0A%7Bts%7DTotal%7B/ts%7D:+%7B%24amount%2B%24membership_amount%7CcrmMoney%7D%0A%7Belseif+%21%24useForMember+%26%26+%24lineItem+and+%24priceSetID+%26+%21%24is_quick_config%7D%0A%7Bforeach+from%3D%24lineItem+item%3Dvalue+key%3Dpriceset%7D%0A---------------------------------------------------------%0A%7Bcapture+assign%3Dts_item%7D%7Bts%7DItem%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_qty%7D%7Bts%7DQty%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_each%7D%7Bts%7DEach%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_total%7D%7Bts%7DTotal%7B/ts%7D%7B/capture%7D%0A%7B%24ts_item%7Cstring_format:%22%25-30s%22%7D+%7B%24ts_qty%7Cstring_format:%22%255s%22%7D+%7B%24ts_each%7Cstring_format:%22%2510s%22%7D+%7B%24ts_total%7Cstring_format:%22%2510s%22%7D%0A----------------------------------------------------------%0A%7Bforeach+from%3D%24value+item%3Dline%7D%0A%7B%24line.description%7Ctruncate:30:%22...%22%7Cstring_format:%22%25-30s%22%7D+%7B%24line.qty%7Cstring_format:%22%255s%22%7D+%7B%24line.unit_price%7CcrmMoney%7Cstring_format:%22%2510s%22%7D+%7B%24line.line_total%7CcrmMoney%7Cstring_format:%22%2510s%22%7D%0A%7B/foreach%7D%0A%7B/foreach%7D%0A%0A%7Bts%7DTotal+Amount%7B/ts%7D:+%7B%24amount%7CcrmMoney%7D%0A%7Belse%7D%0A%7Bif+%24useForMember+%26%26+%24lineItem+%26%26+%21%24is_quick_config%7D%0A%7Bforeach+from%3D%24lineItem+item%3Dvalue+key%3Dpriceset%7D%0A%7Bcapture+assign%3Dts_item%7D%7Bts%7DItem%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_total%7D%7Bts%7DFee%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_start_date%7D%7Bts%7DMembership+Start+Date%7B/ts%7D%7B/capture%7D%0A%7Bcapture+assign%3Dts_end_date%7D%7Bts%7DMembership+End+Date%7B/ts%7D%7B/capture%7D%0A%7B%24ts_item%7Cstring_format:%22%25-30s%22%7D+%7B%24ts_total%7Cstring_format:%22%2510s%22%7D+%7B%24ts_start_date%7Cstring_format:%22%2520s%22%7D+%7B%24ts_end_date%7Cstring_format:%22%2520s%22%7D%0A--------------------------------------------------------------------------------------------------%0A%0A%7Bforeach+from%3D%24value+item%3Dline%7D%0A%7Bcapture+assign%3Dts_item%7D%7Bif+%24line.html_type+eq+%27Text%27%7D%7B%24line.label%7D%7Belse%7D%7B%24line.field_title%7D+-+%7B%24line.label%7D%7B/if%7D+%7Bif+%24line.description%7D+%7B%24line.description%7D%7B/if%7D%7B/capture%7D%7B%24ts_item%7Ctruncate:30:%22...%22%7Cstring_format:%22%25-30s%22%7D+%7B%24line.line_total%7CcrmMoney%7Cstring_format:%22%2510s%22%7D+%7B%24line.start_date%7Cstring_format:%22%2520s%22%7D+%7B%24line.end_date%7Cstring_format:%22%2520s%22%7D%0A%7B/foreach%7D%0A%7B/foreach%7D%0A--------------------------------------------------------------------------------------------------%0A%7B/if%7D%0A%7Bts%7DAmount%7B/ts%7D:+%7B%24amount%7CcrmMoney%7D+%7Bif+%24amount_level+%7D+-+%7B%24amount_level%7D+%7B/if%7D%0A%7B/if%7D%0A%7Belseif+%24membership_amount%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DMembership+Fee%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts+1%3D%24membership_name%7D%251+Membership%7B/ts%7D:+%7B%24membership_amount%7CcrmMoney%7D%0A%7B/if%7D%0A%0A%7Bif+%24receive_date%7D%0A%0A%7Bts%7DDate%7B/ts%7D:+%7B%24receive_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24is_monetary+and+%24trxn_id%7D%0A%7Bts%7DTransaction+%23%7B/ts%7D:+%7B%24trxn_id%7D%0A%0A%7B/if%7D%0A%7Bif+%24membership_trx_id%7D%0A%7Bts%7DMembership+Transaction+%23%7B/ts%7D:+%7B%24membership_trx_id%7D%0A%0A%7B/if%7D%0A%7Bif+%24is_recur%7D%0A%7Bif+%24contributeMode+eq+%27notify%27+or+%24contributeMode+eq+%27directIPN%27%7D%0A%7Bts+1%3D%24cancelSubscriptionUrl%7DThis+membership+will+be+renewed+automatically.+You+can+cancel+the+auto-renewal+option+by+visiting+this+web+page:+%251.%7B/ts%7D%0A%0A%7Bts+1%3D%24updateSubscriptionBillingUrl%7DYou+can+update+billing+details+for+this+automatically+renewed+membership+by+%3Ca+href%3D%22%251%22%3Evisiting+this+web+page%3C/a%3E.%7B/ts%7D%0A%7B/if%7D%0A%7B/if%7D%0A%0A%7Bif+%24honor_block_is_active+%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24honor_type%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24honor_prefix%7D+%7B%24honor_first_name%7D+%7B%24honor_last_name%7D%0A%7Bif+%24honor_email%7D%0A%7Bts%7DHonoree+Email%7B/ts%7D:+%7B%24honor_email%7D%0A%7B/if%7D%0A%0A%7B/if%7D%0A%7Bif+%24pcpBlock%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DPersonal+Campaign+Page%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DDisplay+In+Honor+Roll%7B/ts%7D:+%7Bif+%24pcp_display_in_roll%7D%7Bts%7DYes%7B/ts%7D%7Belse%7D%7Bts%7DNo%7B/ts%7D%7B/if%7D%0A%0A%7Bif+%24pcp_roll_nickname%7D%7Bts%7DNickname%7B/ts%7D:+%7B%24pcp_roll_nickname%7D%7B/if%7D%0A%0A%7Bif+%24pcp_personal_note%7D%7Bts%7DPersonal+Note%7B/ts%7D:+%7B%24pcp_personal_note%7D%7B/if%7D%0A%0A%7B/if%7D%0A%7Bif+%24onBehalfProfile%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DOn+Behalf+Of%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24onBehalfProfile+item%3DonBehalfValue+key%3DonBehalfName%7D%0A%7B%24onBehalfName%7D:+%7B%24onBehalfValue%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%0A%7Bif+%21%28+%24contributeMode+eq+%27notify%27+OR+%24contributeMode+eq+%27directIPN%27+%29+and+%24is_monetary%7D%0A%7Bif+%24is_pay_later%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DRegistered+Email%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24email%7D%0A%7Belseif+%24amount+GT+0+OR+%24membership_amount+GT+0+%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DBilling+Name+and+Address%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24billingName%7D%0A%7B%24address%7D%0A%0A%7B%24email%7D%0A%7B/if%7D+%7B%2A+End+%21+is_pay_later+condition.+%2A%7D%0A%7B/if%7D%0A%7Bif+%24contributeMode+eq+%27direct%27+AND+%21%24is_pay_later+AND+%28+%24amount+GT+0+OR+%24membership_amount+GT+0+%29+%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DCredit+Card+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24credit_card_type%7D%0A%7B%24credit_card_number%7D%0A%7Bts%7DExpires%7B/ts%7D:+%7B%24credit_card_exp_date%7Ctruncate:7:%27%27%7CcrmDate%7D%0A%7B/if%7D%0A%0A%7Bif+%24selectPremium+%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bts%7DPremium+Information%7B/ts%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24product_name%7D%0A%7Bif+%24option%7D%0A%7Bts%7DOption%7B/ts%7D:+%7B%24option%7D%0A%7B/if%7D%0A%7Bif+%24sku%7D%0A%7Bts%7DSKU%7B/ts%7D:+%7B%24sku%7D%0A%7B/if%7D%0A%7Bif+%24start_date%7D%0A%7Bts%7DStart+Date%7B/ts%7D:+%7B%24start_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24end_date%7D%0A%7Bts%7DEnd+Date%7B/ts%7D:+%7B%24end_date%7CcrmDate%7D%0A%7B/if%7D%0A%7Bif+%24contact_email+OR+%24contact_phone%7D%0A%0A%7Bts%7DFor+information+about+this+premium%2C+contact:%7B/ts%7D%0A%0A%7Bif+%24contact_email%7D%0A++%7B%24contact_email%7D%0A%7B/if%7D%0A%7Bif+%24contact_phone%7D%0A++%7B%24contact_phone%7D%0A%7B/if%7D%0A%7B/if%7D%0A%7Bif+%24is_deductible+AND+%24price%7D%0A%0A%7Bts+1%3D%24price%7CcrmMoney%7DThe+value+of+this+premium+is+%251.+This+may+affect+the+amount+of+the+tax+deduction+you+can+claim.+Consult+your+tax+advisor+for+more+information.%7B/ts%7D%7B/if%7D%0A%7B/if%7D%0A%0A%7Bif+%24customPre%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24customPre_grouptitle%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24customPre+item%3DcustomValue+key%3DcustomName%7D%0A%7Bif+%28+%24trackingFields+and+%21+in_array%28+%24customName%2C+%24trackingFields+%29+%29+or+%21+%24trackingFields%7D%0A+%7B%24customName%7D:+%7B%24customValue%7D%0A%7B/if%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A%0A%0A%7Bif+%24customPost%7D%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7B%24customPost_grouptitle%7D%0A%0A%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%3D%0A%7Bforeach+from%3D%24customPost+item%3DcustomValue+key%3DcustomName%7D%0A%7Bif+%28+%24trackingFields+and+%21+in_array%28+%24customName%2C+%24trackingFields+%29+%29+or+%21+%24trackingFields%7D%0A+%7B%24customName%7D:+%7B%24customValue%7D%0A%7B/if%7D%0A%7B/foreach%7D%0A%7B/if%7D%0A */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'ts', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $membership_assign && !$useForMember}
===========================================================
{ts}Membership Information{/ts}

===========================================================
{ts}Membership Type{/ts}: {$membership_name}
{if $mem_start_date}{ts}Membership Start Date{/ts}: {$mem_start_date|crmDate}
{/if}
{if $mem_end_date}{ts}Membership End Date{/ts}: {$mem_end_date|crmDate}
{/if}

{/if}
{if $amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{if !$useForMember && $membership_amount && $is_quick_config}
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{if $amount}
{if ! $is_separate_payment }
{ts}Contribution Amount{/ts}: {$amount|crmMoney}
{else}
{ts}Additional Contribution{/ts}: {$amount|crmMoney}
{/if}
{/if}
-------------------------------------------
{ts}Total{/ts}: {$amount+$membership_amount|crmMoney}
{elseif !$useForMember && $lineItem and $priceSetID & !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{$line.description|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney|string_format:"%10s"} {$line.line_total|crmMoney|string_format:"%10s"}
{/foreach}
{/foreach}

{ts}Total Amount{/ts}: {$amount|crmMoney}
{else}
{if $useForMember && $lineItem && !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_total}{ts}Fee{/ts}{/capture}
{capture assign=ts_start_date}{ts}Membership Start Date{/ts}{/capture}
{capture assign=ts_end_date}{ts}Membership End Date{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_total|string_format:"%10s"} {$ts_start_date|string_format:"%20s"} {$ts_end_date|string_format:"%20s"}
--------------------------------------------------------------------------------------------------

{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.line_total|crmMoney|string_format:"%10s"} {$line.start_date|string_format:"%20s"} {$line.end_date|string_format:"%20s"}
{/foreach}
{/foreach}
--------------------------------------------------------------------------------------------------
{/if}
{ts}Amount{/ts}: {$amount|crmMoney} {if $amount_level } - {$amount_level} {/if}
{/if}
{elseif $membership_amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{/if}

{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}

{/if}
{if $membership_trx_id}
{ts}Membership Transaction #{/ts}: {$membership_trx_id}

{/if}
{if $is_recur}
{if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
{ts 1=$cancelSubscriptionUrl}This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.{/ts}

{ts 1=$updateSubscriptionBillingUrl}You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.{/ts}
{/if}
{/if}

{if $honor_block_is_active }
===========================================================
{$honor_type}
===========================================================
{$honor_prefix} {$honor_first_name} {$honor_last_name}
{if $honor_email}
{ts}Honoree Email{/ts}: {$honor_email}
{/if}

{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0 OR $membership_amount GT 0 }
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND ( $amount GT 0 OR $membership_amount GT 0 ) }

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}
', 11, false),array('modifier', 'crmDate', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $membership_assign && !$useForMember}
===========================================================
{ts}Membership Information{/ts}

===========================================================
{ts}Membership Type{/ts}: {$membership_name}
{if $mem_start_date}{ts}Membership Start Date{/ts}: {$mem_start_date|crmDate}
{/if}
{if $mem_end_date}{ts}Membership End Date{/ts}: {$mem_end_date|crmDate}
{/if}

{/if}
{if $amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{if !$useForMember && $membership_amount && $is_quick_config}
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{if $amount}
{if ! $is_separate_payment }
{ts}Contribution Amount{/ts}: {$amount|crmMoney}
{else}
{ts}Additional Contribution{/ts}: {$amount|crmMoney}
{/if}
{/if}
-------------------------------------------
{ts}Total{/ts}: {$amount+$membership_amount|crmMoney}
{elseif !$useForMember && $lineItem and $priceSetID & !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{$line.description|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney|string_format:"%10s"} {$line.line_total|crmMoney|string_format:"%10s"}
{/foreach}
{/foreach}

{ts}Total Amount{/ts}: {$amount|crmMoney}
{else}
{if $useForMember && $lineItem && !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_total}{ts}Fee{/ts}{/capture}
{capture assign=ts_start_date}{ts}Membership Start Date{/ts}{/capture}
{capture assign=ts_end_date}{ts}Membership End Date{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_total|string_format:"%10s"} {$ts_start_date|string_format:"%20s"} {$ts_end_date|string_format:"%20s"}
--------------------------------------------------------------------------------------------------

{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.line_total|crmMoney|string_format:"%10s"} {$line.start_date|string_format:"%20s"} {$line.end_date|string_format:"%20s"}
{/foreach}
{/foreach}
--------------------------------------------------------------------------------------------------
{/if}
{ts}Amount{/ts}: {$amount|crmMoney} {if $amount_level } - {$amount_level} {/if}
{/if}
{elseif $membership_amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{/if}

{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}

{/if}
{if $membership_trx_id}
{ts}Membership Transaction #{/ts}: {$membership_trx_id}

{/if}
{if $is_recur}
{if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
{ts 1=$cancelSubscriptionUrl}This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.{/ts}

{ts 1=$updateSubscriptionBillingUrl}You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.{/ts}
{/if}
{/if}

{if $honor_block_is_active }
===========================================================
{$honor_type}
===========================================================
{$honor_prefix} {$honor_first_name} {$honor_last_name}
{if $honor_email}
{ts}Honoree Email{/ts}: {$honor_email}
{/if}

{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0 OR $membership_amount GT 0 }
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND ( $amount GT 0 OR $membership_amount GT 0 ) }

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}
', 20, false),array('modifier', 'crmMoney', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $membership_assign && !$useForMember}
===========================================================
{ts}Membership Information{/ts}

===========================================================
{ts}Membership Type{/ts}: {$membership_name}
{if $mem_start_date}{ts}Membership Start Date{/ts}: {$mem_start_date|crmDate}
{/if}
{if $mem_end_date}{ts}Membership End Date{/ts}: {$mem_end_date|crmDate}
{/if}

{/if}
{if $amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{if !$useForMember && $membership_amount && $is_quick_config}
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{if $amount}
{if ! $is_separate_payment }
{ts}Contribution Amount{/ts}: {$amount|crmMoney}
{else}
{ts}Additional Contribution{/ts}: {$amount|crmMoney}
{/if}
{/if}
-------------------------------------------
{ts}Total{/ts}: {$amount+$membership_amount|crmMoney}
{elseif !$useForMember && $lineItem and $priceSetID & !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{$line.description|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney|string_format:"%10s"} {$line.line_total|crmMoney|string_format:"%10s"}
{/foreach}
{/foreach}

{ts}Total Amount{/ts}: {$amount|crmMoney}
{else}
{if $useForMember && $lineItem && !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_total}{ts}Fee{/ts}{/capture}
{capture assign=ts_start_date}{ts}Membership Start Date{/ts}{/capture}
{capture assign=ts_end_date}{ts}Membership End Date{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_total|string_format:"%10s"} {$ts_start_date|string_format:"%20s"} {$ts_end_date|string_format:"%20s"}
--------------------------------------------------------------------------------------------------

{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.line_total|crmMoney|string_format:"%10s"} {$line.start_date|string_format:"%20s"} {$line.end_date|string_format:"%20s"}
{/foreach}
{/foreach}
--------------------------------------------------------------------------------------------------
{/if}
{ts}Amount{/ts}: {$amount|crmMoney} {if $amount_level } - {$amount_level} {/if}
{/if}
{elseif $membership_amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{/if}

{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}

{/if}
{if $membership_trx_id}
{ts}Membership Transaction #{/ts}: {$membership_trx_id}

{/if}
{if $is_recur}
{if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
{ts 1=$cancelSubscriptionUrl}This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.{/ts}

{ts 1=$updateSubscriptionBillingUrl}You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.{/ts}
{/if}
{/if}

{if $honor_block_is_active }
===========================================================
{$honor_type}
===========================================================
{$honor_prefix} {$honor_first_name} {$honor_last_name}
{if $honor_email}
{ts}Honoree Email{/ts}: {$honor_email}
{/if}

{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0 OR $membership_amount GT 0 }
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND ( $amount GT 0 OR $membership_amount GT 0 ) }

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}
', 32, false),array('modifier', 'string_format', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $membership_assign && !$useForMember}
===========================================================
{ts}Membership Information{/ts}

===========================================================
{ts}Membership Type{/ts}: {$membership_name}
{if $mem_start_date}{ts}Membership Start Date{/ts}: {$mem_start_date|crmDate}
{/if}
{if $mem_end_date}{ts}Membership End Date{/ts}: {$mem_end_date|crmDate}
{/if}

{/if}
{if $amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{if !$useForMember && $membership_amount && $is_quick_config}
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{if $amount}
{if ! $is_separate_payment }
{ts}Contribution Amount{/ts}: {$amount|crmMoney}
{else}
{ts}Additional Contribution{/ts}: {$amount|crmMoney}
{/if}
{/if}
-------------------------------------------
{ts}Total{/ts}: {$amount+$membership_amount|crmMoney}
{elseif !$useForMember && $lineItem and $priceSetID & !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{$line.description|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney|string_format:"%10s"} {$line.line_total|crmMoney|string_format:"%10s"}
{/foreach}
{/foreach}

{ts}Total Amount{/ts}: {$amount|crmMoney}
{else}
{if $useForMember && $lineItem && !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_total}{ts}Fee{/ts}{/capture}
{capture assign=ts_start_date}{ts}Membership Start Date{/ts}{/capture}
{capture assign=ts_end_date}{ts}Membership End Date{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_total|string_format:"%10s"} {$ts_start_date|string_format:"%20s"} {$ts_end_date|string_format:"%20s"}
--------------------------------------------------------------------------------------------------

{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.line_total|crmMoney|string_format:"%10s"} {$line.start_date|string_format:"%20s"} {$line.end_date|string_format:"%20s"}
{/foreach}
{/foreach}
--------------------------------------------------------------------------------------------------
{/if}
{ts}Amount{/ts}: {$amount|crmMoney} {if $amount_level } - {$amount_level} {/if}
{/if}
{elseif $membership_amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{/if}

{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}

{/if}
{if $membership_trx_id}
{ts}Membership Transaction #{/ts}: {$membership_trx_id}

{/if}
{if $is_recur}
{if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
{ts 1=$cancelSubscriptionUrl}This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.{/ts}

{ts 1=$updateSubscriptionBillingUrl}You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.{/ts}
{/if}
{/if}

{if $honor_block_is_active }
===========================================================
{$honor_type}
===========================================================
{$honor_prefix} {$honor_first_name} {$honor_last_name}
{if $honor_email}
{ts}Honoree Email{/ts}: {$honor_email}
{/if}

{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0 OR $membership_amount GT 0 }
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND ( $amount GT 0 OR $membership_amount GT 0 ) }

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}
', 49, false),array('modifier', 'truncate', 'string:{if $receipt_text}
{$receipt_text}
{/if}
{if $is_pay_later}

===========================================================
{$pay_later_receipt}
===========================================================
{else}

{ts}Please print this receipt for your records.{/ts}
{/if}

{if $membership_assign && !$useForMember}
===========================================================
{ts}Membership Information{/ts}

===========================================================
{ts}Membership Type{/ts}: {$membership_name}
{if $mem_start_date}{ts}Membership Start Date{/ts}: {$mem_start_date|crmDate}
{/if}
{if $mem_end_date}{ts}Membership End Date{/ts}: {$mem_end_date|crmDate}
{/if}

{/if}
{if $amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{if !$useForMember && $membership_amount && $is_quick_config}
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{if $amount}
{if ! $is_separate_payment }
{ts}Contribution Amount{/ts}: {$amount|crmMoney}
{else}
{ts}Additional Contribution{/ts}: {$amount|crmMoney}
{/if}
{/if}
-------------------------------------------
{ts}Total{/ts}: {$amount+$membership_amount|crmMoney}
{elseif !$useForMember && $lineItem and $priceSetID & !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
---------------------------------------------------------
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_qty}{ts}Qty{/ts}{/capture}
{capture assign=ts_each}{ts}Each{/ts}{/capture}
{capture assign=ts_total}{ts}Total{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_qty|string_format:"%5s"} {$ts_each|string_format:"%10s"} {$ts_total|string_format:"%10s"}
----------------------------------------------------------
{foreach from=$value item=line}
{$line.description|truncate:30:"..."|string_format:"%-30s"} {$line.qty|string_format:"%5s"} {$line.unit_price|crmMoney|string_format:"%10s"} {$line.line_total|crmMoney|string_format:"%10s"}
{/foreach}
{/foreach}

{ts}Total Amount{/ts}: {$amount|crmMoney}
{else}
{if $useForMember && $lineItem && !$is_quick_config}
{foreach from=$lineItem item=value key=priceset}
{capture assign=ts_item}{ts}Item{/ts}{/capture}
{capture assign=ts_total}{ts}Fee{/ts}{/capture}
{capture assign=ts_start_date}{ts}Membership Start Date{/ts}{/capture}
{capture assign=ts_end_date}{ts}Membership End Date{/ts}{/capture}
{$ts_item|string_format:"%-30s"} {$ts_total|string_format:"%10s"} {$ts_start_date|string_format:"%20s"} {$ts_end_date|string_format:"%20s"}
--------------------------------------------------------------------------------------------------

{foreach from=$value item=line}
{capture assign=ts_item}{if $line.html_type eq \'Text\'}{$line.label}{else}{$line.field_title} - {$line.label}{/if} {if $line.description} {$line.description}{/if}{/capture}{$ts_item|truncate:30:"..."|string_format:"%-30s"} {$line.line_total|crmMoney|string_format:"%10s"} {$line.start_date|string_format:"%20s"} {$line.end_date|string_format:"%20s"}
{/foreach}
{/foreach}
--------------------------------------------------------------------------------------------------
{/if}
{ts}Amount{/ts}: {$amount|crmMoney} {if $amount_level } - {$amount_level} {/if}
{/if}
{elseif $membership_amount}
===========================================================
{ts}Membership Fee{/ts}

===========================================================
{ts 1=$membership_name}%1 Membership{/ts}: {$membership_amount|crmMoney}
{/if}

{if $receive_date}

{ts}Date{/ts}: {$receive_date|crmDate}
{/if}
{if $is_monetary and $trxn_id}
{ts}Transaction #{/ts}: {$trxn_id}

{/if}
{if $membership_trx_id}
{ts}Membership Transaction #{/ts}: {$membership_trx_id}

{/if}
{if $is_recur}
{if $contributeMode eq \'notify\' or $contributeMode eq \'directIPN\'}
{ts 1=$cancelSubscriptionUrl}This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.{/ts}

{ts 1=$updateSubscriptionBillingUrl}You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.{/ts}
{/if}
{/if}

{if $honor_block_is_active }
===========================================================
{$honor_type}
===========================================================
{$honor_prefix} {$honor_first_name} {$honor_last_name}
{if $honor_email}
{ts}Honoree Email{/ts}: {$honor_email}
{/if}

{/if}
{if $pcpBlock}
===========================================================
{ts}Personal Campaign Page{/ts}

===========================================================
{ts}Display In Honor Roll{/ts}: {if $pcp_display_in_roll}{ts}Yes{/ts}{else}{ts}No{/ts}{/if}

{if $pcp_roll_nickname}{ts}Nickname{/ts}: {$pcp_roll_nickname}{/if}

{if $pcp_personal_note}{ts}Personal Note{/ts}: {$pcp_personal_note}{/if}

{/if}
{if $onBehalfProfile}
===========================================================
{ts}On Behalf Of{/ts}

===========================================================
{foreach from=$onBehalfProfile item=onBehalfValue key=onBehalfName}
{$onBehalfName}: {$onBehalfValue}
{/foreach}
{/if}

{if !( $contributeMode eq \'notify\' OR $contributeMode eq \'directIPN\' ) and $is_monetary}
{if $is_pay_later}
===========================================================
{ts}Registered Email{/ts}

===========================================================
{$email}
{elseif $amount GT 0 OR $membership_amount GT 0 }
===========================================================
{ts}Billing Name and Address{/ts}

===========================================================
{$billingName}
{$address}

{$email}
{/if} {* End ! is_pay_later condition. *}
{/if}
{if $contributeMode eq \'direct\' AND !$is_pay_later AND ( $amount GT 0 OR $membership_amount GT 0 ) }

===========================================================
{ts}Credit Card Information{/ts}

===========================================================
{$credit_card_type}
{$credit_card_number}
{ts}Expires{/ts}: {$credit_card_exp_date|truncate:7:\'\'|crmDate}
{/if}

{if $selectPremium }
===========================================================
{ts}Premium Information{/ts}

===========================================================
{$product_name}
{if $option}
{ts}Option{/ts}: {$option}
{/if}
{if $sku}
{ts}SKU{/ts}: {$sku}
{/if}
{if $start_date}
{ts}Start Date{/ts}: {$start_date|crmDate}
{/if}
{if $end_date}
{ts}End Date{/ts}: {$end_date|crmDate}
{/if}
{if $contact_email OR $contact_phone}

{ts}For information about this premium, contact:{/ts}

{if $contact_email}
  {$contact_email}
{/if}
{if $contact_phone}
  {$contact_phone}
{/if}
{/if}
{if $is_deductible AND $price}

{ts 1=$price|crmMoney}The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.{/ts}{/if}
{/if}

{if $customPre}
===========================================================
{$customPre_grouptitle}

===========================================================
{foreach from=$customPre item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}


{if $customPost}
===========================================================
{$customPost_grouptitle}

===========================================================
{foreach from=$customPost item=customValue key=customName}
{if ( $trackingFields and ! in_array( $customName, $trackingFields ) ) or ! $trackingFields}
 {$customName}: {$customValue}
{/if}
{/foreach}
{/if}
', 52, false),)), $this); ?>
<?php if ($this->_tpl_vars['receipt_text']): ?>
<?php echo $this->_tpl_vars['receipt_text']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['is_pay_later']): ?>

===========================================================
<?php echo $this->_tpl_vars['pay_later_receipt']; ?>

===========================================================
<?php else: ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Please print this receipt for your records.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['membership_assign'] && ! $this->_tpl_vars['useForMember']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Type<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['membership_name']; ?>

<?php if ($this->_tpl_vars['mem_start_date']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Start Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['mem_start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['mem_end_date']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership End Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['mem_end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['amount']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Fee<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php if (! $this->_tpl_vars['useForMember'] && $this->_tpl_vars['membership_amount'] && $this->_tpl_vars['is_quick_config']): ?>
<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['membership_name'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%1 Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['membership_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php if ($this->_tpl_vars['amount']): ?>
<?php if (! $this->_tpl_vars['is_separate_payment']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Contribution Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php else: ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Additional Contribution<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php endif; ?>
<?php endif; ?>
-------------------------------------------
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount']+$this->_tpl_vars['membership_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php elseif (! $this->_tpl_vars['useForMember'] && $this->_tpl_vars['lineItem'] && $this->_tpl_vars['priceSetID'] & ! $this->_tpl_vars['is_quick_config']): ?>
<?php $_from = $this->_tpl_vars['lineItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
---------------------------------------------------------
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Item<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_item', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Qty<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_qty', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Each<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_each', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_total', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['ts_item'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_qty'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%5s") : smarty_modifier_string_format($_tmp, "%5s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_each'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_total'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>

----------------------------------------------------------
<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line']):
?>
<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['description'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['qty'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%5s") : smarty_modifier_string_format($_tmp, "%5s")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['unit_price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['line_total'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>

<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Total Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php else: ?>
<?php if ($this->_tpl_vars['useForMember'] && $this->_tpl_vars['lineItem'] && ! $this->_tpl_vars['is_quick_config']): ?>
<?php $_from = $this->_tpl_vars['lineItem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['priceset'] => $this->_tpl_vars['value']):
?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Item<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_item', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Fee<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_total', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Start Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_start_date', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership End Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_end_date', ob_get_contents());ob_end_clean(); ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['ts_item'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_total'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_start_date'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%20s") : smarty_modifier_string_format($_tmp, "%20s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['ts_end_date'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%20s") : smarty_modifier_string_format($_tmp, "%20s")); ?>

--------------------------------------------------------------------------------------------------

<?php $_from = $this->_tpl_vars['value']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['line']):
?>
<?php ob_start(); ?><?php if ($this->_tpl_vars['line']['html_type'] == 'Text'): ?><?php echo $this->_tpl_vars['line']['label']; ?>
<?php else: ?><?php echo $this->_tpl_vars['line']['field_title']; ?>
 - <?php echo $this->_tpl_vars['line']['label']; ?>
<?php endif; ?> <?php if ($this->_tpl_vars['line']['description']): ?> <?php echo $this->_tpl_vars['line']['description']; ?>
<?php endif; ?><?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('ts_item', ob_get_contents());ob_end_clean(); ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['ts_item'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...") : smarty_modifier_truncate($_tmp, 30, "...")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%-30s") : smarty_modifier_string_format($_tmp, "%-30s")); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['line']['line_total'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%10s") : smarty_modifier_string_format($_tmp, "%10s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['start_date'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%20s") : smarty_modifier_string_format($_tmp, "%20s")); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['line']['end_date'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%20s") : smarty_modifier_string_format($_tmp, "%20s")); ?>

<?php endforeach; endif; unset($_from); ?>
<?php endforeach; endif; unset($_from); ?>
--------------------------------------------------------------------------------------------------
<?php endif; ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Amount<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>
 <?php if ($this->_tpl_vars['amount_level']): ?> - <?php echo $this->_tpl_vars['amount_level']; ?>
 <?php endif; ?>
<?php endif; ?>
<?php elseif ($this->_tpl_vars['membership_amount']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Fee<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['membership_name'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>%1 Membership<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['membership_amount'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['receive_date']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['receive_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['is_monetary'] && $this->_tpl_vars['trxn_id']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['trxn_id']; ?>


<?php endif; ?>
<?php if ($this->_tpl_vars['membership_trx_id']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Membership Transaction #<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['membership_trx_id']; ?>


<?php endif; ?>
<?php if ($this->_tpl_vars['is_recur']): ?>
<?php if ($this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN'): ?>
<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['cancelSubscriptionUrl'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>This membership will be renewed automatically. You can cancel the auto-renewal option by visiting this web page: %1.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php $this->_tag_stack[] = array('ts', array('1' => $this->_tpl_vars['updateSubscriptionBillingUrl'])); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>You can update billing details for this automatically renewed membership by <a href="%1">visiting this web page</a>.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['honor_block_is_active']): ?>
===========================================================
<?php echo $this->_tpl_vars['honor_type']; ?>

===========================================================
<?php echo $this->_tpl_vars['honor_prefix']; ?>
 <?php echo $this->_tpl_vars['honor_first_name']; ?>
 <?php echo $this->_tpl_vars['honor_last_name']; ?>

<?php if ($this->_tpl_vars['honor_email']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Honoree Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['honor_email']; ?>

<?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['pcpBlock']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Campaign Page<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Display In Honor Roll<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php if ($this->_tpl_vars['pcp_display_in_roll']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Yes<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php else: ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>No<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>

<?php if ($this->_tpl_vars['pcp_roll_nickname']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Nickname<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['pcp_roll_nickname']; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['pcp_personal_note']): ?><?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Personal Note<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['pcp_personal_note']; ?>
<?php endif; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['onBehalfProfile']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>On Behalf Of<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php $_from = $this->_tpl_vars['onBehalfProfile']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onBehalfName'] => $this->_tpl_vars['onBehalfValue']):
?>
<?php echo $this->_tpl_vars['onBehalfName']; ?>
: <?php echo $this->_tpl_vars['onBehalfValue']; ?>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

<?php if (! ( $this->_tpl_vars['contributeMode'] == 'notify' || $this->_tpl_vars['contributeMode'] == 'directIPN' ) && $this->_tpl_vars['is_monetary']): ?>
<?php if ($this->_tpl_vars['is_pay_later']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Registered Email<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['email']; ?>

<?php elseif ($this->_tpl_vars['amount'] > 0 || $this->_tpl_vars['membership_amount'] > 0): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Billing Name and Address<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['billingName']; ?>

<?php echo $this->_tpl_vars['address']; ?>


<?php echo $this->_tpl_vars['email']; ?>

<?php endif; ?> <?php endif; ?>
<?php if ($this->_tpl_vars['contributeMode'] == 'direct' && ! $this->_tpl_vars['is_pay_later'] && ( $this->_tpl_vars['amount'] > 0 || $this->_tpl_vars['membership_amount'] > 0 )): ?>

===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Credit Card Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['credit_card_type']; ?>

<?php echo $this->_tpl_vars['credit_card_number']; ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Expires<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['credit_card_exp_date'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 7, '') : smarty_modifier_truncate($_tmp, 7, '')))) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['selectPremium']): ?>
===========================================================
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Premium Information<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

===========================================================
<?php echo $this->_tpl_vars['product_name']; ?>

<?php if ($this->_tpl_vars['option']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Option<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['option']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['sku']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>SKU<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo $this->_tpl_vars['sku']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['start_date']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Start Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['start_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['end_date']): ?>
<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>End Date<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>: <?php echo ((is_array($_tmp=$this->_tpl_vars['end_date'])) ? $this->_run_mod_handler('crmDate', true, $_tmp) : smarty_modifier_crmDate($_tmp)); ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['contact_email'] || $this->_tpl_vars['contact_phone']): ?>

<?php $this->_tag_stack[] = array('ts', array()); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>For information about this premium, contact:<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['contact_email']): ?>
  <?php echo $this->_tpl_vars['contact_email']; ?>

<?php endif; ?>
<?php if ($this->_tpl_vars['contact_phone']): ?>
  <?php echo $this->_tpl_vars['contact_phone']; ?>

<?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['is_deductible'] && $this->_tpl_vars['price']): ?>

<?php $this->_tag_stack[] = array('ts', array('1' => ((is_array($_tmp=$this->_tpl_vars['price'])) ? $this->_run_mod_handler('crmMoney', true, $_tmp) : smarty_modifier_crmMoney($_tmp)))); $_block_repeat=true;smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>The value of this premium is %1. This may affect the amount of the tax deduction you can claim. Consult your tax advisor for more information.<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_ts($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['customPre']): ?>
===========================================================
<?php echo $this->_tpl_vars['customPre_grouptitle']; ?>


===========================================================
<?php $_from = $this->_tpl_vars['customPre']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
<?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
 <?php echo $this->_tpl_vars['customName']; ?>
: <?php echo $this->_tpl_vars['customValue']; ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['customPost']): ?>
===========================================================
<?php echo $this->_tpl_vars['customPost_grouptitle']; ?>


===========================================================
<?php $_from = $this->_tpl_vars['customPost']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customName'] => $this->_tpl_vars['customValue']):
?>
<?php if (( $this->_tpl_vars['trackingFields'] && ! in_array ( $this->_tpl_vars['customName'] , $this->_tpl_vars['trackingFields'] ) ) || ! $this->_tpl_vars['trackingFields']): ?>
 <?php echo $this->_tpl_vars['customName']; ?>
: <?php echo $this->_tpl_vars['customValue']; ?>

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>