<?php

namespace Barion\common;

/**
 * Class TransactionType
 * @package Barion\common
 *
 * @see https://docs.barion.com/TransactionType
 */
abstract class TransactionType
{
    /**
     * Completed e-money payment between a user and a shop.
     */
    const SHOP = 'Shop';
    /**
     * E-money transfer between two existing Barion users.
     */
    const TRANSFER_TO_EXISTTING_USER = 'TransferToExistingUser';
    /**
     * E-money transfer from an existing Barion user to a not existing user.
     */
    const TRANSFER_TO_TECHNICAL_ACCOUNT = 'TransferToTechnicalAccount';
    /**
     * Reserved payment between a user and a shop.
     */
    const RESERVE = 'Reserve';
    /**
     * Storno amount from a previously reserved payment, if it was finished with a lower amount.
     */
    const STORNO_RESERVE = 'StornoReserve';
    /**
     * Bank card processing fee deducted from the shop by the Barion system.
     */
    const CARD_PROCESSING_FEE = 'CardProcessingFee';
    /**
     * The Barion Smart Gateway fee deducted from the shop by the Barion system.
     */
    const GATEWAY_FEE = 'GatewayFee';
    /**
     * The previously reserved bank card processing fee returned to the shop if the user paid with their Barion wallet.
     */
    const CARD_PROCESSING_FEE_STORNO = 'CardProcessingFeeStorno';
    /**
     * The transaction is just a placeholder, the type will be determined later on.
     */
    const UNSPECIFIED = 'Unspecified';
    /**
     * Bank card payment between a user and a shop.
     */
    const CARD_PAYMENT = 'CardPayment';
    /**
     * Refund of a payment to a Barion wallet.
     */
    const REFUND = 'Refund';
    /**
     * Refund of a payment to a bank card.
     */
    const REFUND_TO_BANK_CARD = 'RefundToBankCard';
    /**
     * Storno of an unsuccessful refund to a bank card to the shop.
     */
    const STORNO_UN_SUCCESSFUL_REFUND_TO_BANK_CARD = 'StornoUnSuccessfulRefundToBankCard';
    /**
     * Payment is under investigation
     */
    const UNDER_REVIEW = 'UnderReview';
    /**
     * Payment is released from investigation
     */
    const RELEASE_REVIEW = 'ReleaseReview';
    /**
     * Bank transfer payment between customer and shop. Used in payment button scenarios.
     */
    const BANK_TRANSFER_PAYMENT = 'BankTransferPayment';
    /**
     * Refund of a payment to a bank account. Used in payment button scenarios.
     */
    const REFUND_TO_BANK_ACCOUNT = 'RefundToBankAccount';
    /**
     * Storno of an unsuccessful refund to a bank account. Used in payment button scenarios.
     */
    const STORNO_UN_SUCCESSFUL_REFUND_TO_BANK_ACCOUNT = 'StornoUnSuccessfulRefundToBankAccount';
    /**
     * The fee deducted from the shop by the Barion system for using the bank transfer payment. Used in payment button scenarios.
     */
    const BANK_TRANSFER_PAYMENT_FEE = 'BankTransferPaymentFee';
}